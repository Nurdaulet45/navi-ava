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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function registerAjax(RegisterRequest $request)
    {
//        dd(in_array($request->user_type, Role::DEFAULT_ROLES), $request->user_type);

        $rand =

        $user = User::create([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        $user->syncRoles([$request->user_type ?: Role::DEFAULT_ROLE]);
        $user->default_role = $request->user_type ?: Role::DEFAULT_ROLE;
        $user->save();

        Auth::login($user);

        return response()->json(['data' => [
            'success' => true
        ]]);
    }

    public function loginAjax(LoginRequest $request)
    {
        $user = User::where('email', $request->email_or_phone)->orWhere('phone', $request->email_or_phone)->withTrashed()->firstOr(function () {
            throw ValidationException::withMessages([
                'email_or_phone' => [__('Email или номер телефона не найден')]
            ]);
        });


        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => [__('site.Login or password is incorrect')]
            ]);
        }
        Auth::login($user);
//        if(!empty( $user->default_role)) {
//            $user->roles()->first();
//        }
        return response()->json(['data' => [
            'success' => true,
            'is_trashed' => false
        ]]);

    }

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
