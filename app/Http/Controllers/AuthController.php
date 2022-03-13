<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\CheckEmailRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\ResetPasswordUpdateRequest;
use App\Mail\ResetPassword;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRoleInformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function checkEmailAjax(CheckEmailRequest $request)
    {
        if (User::emailBy($request->email)->exists()) {
            throw ValidationException::withMessages([
                'email' => ['Пользователь с таким email уже существует.']
            ]);
        }
        return response()->json(['data' => [
            'success' => true
        ]]);
    }

    /**
     * @throws ValidationException
     * @throws \Exception
     */
    public function registerAjax(RegisterRequest $request)
    {
        if (User::emailBy($request->email)->exists()) {
            throw ValidationException::withMessages([
                'email' => ['Пользователь с таким email уже существует.']
            ]);
        }
        DB::beginTransaction();

        do {
            $generatedUserLogin = random_int(10000000, 99999999);
        } while (
            User::query()->where('login', $generatedUserLogin)->exists()
        );

        $user = User::create([
            'login' => $generatedUserLogin,
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        $user->syncRoles(Role::DEFAULT_ROLES);
        $user->default_role = $request->user_type ?: Role::DEFAULT_ROLE;
        $user->save();

        $roles = Role::query()
            ->whereNotIn('id', [1])
            ->orderBy('id')
            ->pluck('name', 'id');

        foreach ($roles as $roleId => $roleName) {
            UserRoleInformation::create([
                'user_id' => $user->id,
                'login' => $generatedUserLogin,
                'role_id' => $roleId,
                'role_name' => $roleName,
                'is_activated' => ($roleName == $request->user_type) ? 1 : 0
            ]);
        }
        DB::commit();

        Auth::login($user);

        $userController = new UserController;
        $userController->sendVerifyEmail();

        return response()->json(['data' => ['success' => true]]);
    }

    /**
     * @throws ValidationException
     */
    public function loginAjax(LoginRequest $request)
    {
        $user = User::where('email', $request->email_or_phone)->orWhere('phone', $request->email_or_phone)->orWhere('login', $request->email_or_phone)->withTrashed()->firstOr(function () {
            throw ValidationException::withMessages([
                'email_or_phone' => [__('Email, логин или номер телефона не найден')]
            ]);
        });

        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => [__('site.Login or password is incorrect')]
            ]);
        }
        Auth::login($user);

        return response()->json(['data' => [
            'success' => true,
            'is_trashed' => false
        ]]);

    }

    public function resetPassword($token)
    {
        return view('client.auth.password-reset', compact('token'));
    }

    public function resetPasswordUpdate(ResetPasswordUpdateRequest $request)
    {
        $token = $request->token;
        $user = User::where('uuid', $token)->whereNotNull('uuid')->orWhere('uuid', '<>', '')->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->uuid = null;
            $user->save();
            Auth::login($user);
            return redirect()->route('index');
        }
        return redirect()->back()->withErrors(['msg' => __('site.The link is invalid')]);
    }

    public function resetPasswordSendEmail(ResetPasswordRequest $request): \Illuminate\Http\JsonResponse
    {
        $email = $request->email;

        $user = User::emailBy($email)->firstOr(function () {
            throw ValidationException::withMessages([
                'email' => [__('site.Email not found')]
            ]);
        });

        $user->uuid = Str::uuid();
        $user->save();
        try {
            Mail::to($user->email)->send(new ResetPassword($user->uuid));

        } catch (\Exception $exception) {
            throw ValidationException::withMessages([
                'email' => [__('Не удалось отправить сообщения на почту')]
            ]);
        }
        return response()->json(['data' => [
            'success' => true,
        ]]);
    }

    public function verifyEmail($token)
    {
        $user = User::where('email_verify_uuid', $token)->whereNotNull('email_verify_uuid')->orWhere('email_verify_uuid', '<>', '')->first();
        if ($user) {
            Auth::login($user);
            $user->is_email_confirmed = true;
            $user->email_verify_uuid = null;
            $user->save();
            return view('client.auth.verified-email');
        }
        return redirect()->route('index')->withErrors(['invalid_link' => __('site.The link is invalid')]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
