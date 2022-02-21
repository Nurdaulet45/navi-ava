<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\AboutMeRequest;
use App\Http\Requests\User\ChangeMailRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\MentoringSaveRequest;
use App\Http\Requests\User\SessionLoginAsRequest;
use App\Http\Requests\User\SpecializationSaveRequest;
use App\Mail\EmailVerify;
use App\Models\Country;
use App\Models\Role;
use App\Models\Specialization;
use App\Models\User;
use App\Services\AcceptByUserRole;
use App\Services\FileService;
use App\Services\SessionRoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function cabinet()
    {
        $user = User::leftJoinCountryName()->findOrFail(auth()->user()->id);
        return view('client.cabinet.index', compact('user'));
    }

    public function sessionLoginAs(SessionLoginAsRequest $request)
    {
        Session::put('role', $request->role);
        return redirect()->back()->withSuccess('Вы вошли как ' . mb_strtolower(SessionRoleService::roleName($request->role)));
    }

    public function aboutMe()
    {
        $countries = Country::get();
        $user = auth()->user();
        return view('client.cabinet.about-me', compact('countries', 'user'));
    }

    public function saveAboutMe(AboutMeRequest $request)
    {
        $user = auth()->user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->skills_description = $request->skills_description;
        $user->about_me = $request->about_me;
        $user->country_id = $request->country_id ?: null;
        $user->address = $request->address;
        $user->gender = $request->input('gender', User::DEFAULT_GENDER) == User::DEFAULT_GENDER;
        $user->phone = $request->input('phone', null);

        if ($request->hasFile('avatar')) {
            $user->avatar = FileService::saveFile($request->file('avatar'), User::IMAGE_PATH);
        }
        if ($request->hasFile('profile_header_image')) {
            $user->profile_header_image = FileService::saveFile($request->file('profile_header_image'), User::IMAGE_PATH);
        }
        $user->save();
        return redirect()->back()->withSuccess('Успешно изменен');
    }

    public function deleteProfile()
    {
        auth()->user()->delete();
        Auth::logout();
        return redirect()->route('index')->withSuccess('Профиль успешно удален');
    }

    public function deleteProfileHeaderImage()
    {
        $user = auth()->user();
        if ($user->profile_header_image) {
            FileService::deleteFile($user->profile_header_image, User::IMAGE_PATH);
        }
        $user->profile_header_image = null;
        $user->save();
        return redirect()->back()->withSuccess('Обложка успешно удален');

    }

    public function sendVerifyEmail()
    {
        try {
            $emailVerifyUuid = Str::uuid();
            $user = auth()->user();
            $user->email_verify_uuid = $emailVerifyUuid;
            $user->save();
            Mail::to(auth()->user()->email)->send(new EmailVerify($emailVerifyUuid));
        } catch (\Exception $exception) {
            throw ValidationException::withMessages([
                'email' => [__('site.Failed to send messages to the mail')],
            ]);
        }
        return response()->json(['data' => [
            'success' => true,
            'message' => __('site.Check your email')
        ]]);
    }

    public function changeMail()
    {
        return view('client.cabinet.change-mail');
    }

    public function saveChangeMail(ChangeMailRequest $request)
    {
        $user = auth()->user();
        $user->email = $request->email;
        $user->is_email_confirmed = false;
        $user->save();
        return redirect()->back()->withSuccess('Успешно изменен');
    }

    public function changePassword()
    {
        return view('client.cabinet.change-password');
    }

    public function saveChangePassword(ChangePasswordRequest $request)
    {
        $user = auth()->user();
        if (Hash::check($request->password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->withSuccess('Успешно изменен');
        }
        return redirect()->back()->withErrors(['password' => 'Введен неверный пароль']);
    }

    public function settingNotification()
    {
        return view('client.cabinet.setting-notification');
    }

    public function saveSettingNotification(\Illuminate\Http\Request $request)
    {
        $user = auth()->user();
        $user->is_mail_notification_enabled = $request->has('is_mail_notification_enabled');
        $user->is_phone_notification_enabled = $request->has('is_phone_notification_enabled');
        $user->save();
        return redirect()->back()->withSuccess('Успешно изменен');
    }


    public function specialization()
    {
        $specializations = Specialization::all();
        $length = $specializations->count();

        $leftBlockSpecializations = [];
        $rightBlockSpecializations = [];
        foreach ($specializations as $key => $specialization) {
            if ($key < round($length / 2)) {
                $leftBlockSpecializations[] = $specialization;
            } else {
                $rightBlockSpecializations[] = $specialization;
            }
        }
        unset($specializations);
        unset($specialization);

        return view('client.cabinet.specialization', compact('leftBlockSpecializations', 'rightBlockSpecializations'));
    }


    public function saveSpecialization(SpecializationSaveRequest $request)
    {
        $user = \auth()->user();
        $user->specialization_text = $request->specialization_text ?: $user->specialization_text;
        $user->specialization_id = $request->specialization_id;
        $user->skills = $request->input('skills', []);
        $user->save();
        return redirect()->back()->withSuccess('Успешно изменен');
    }

    public function mentoring()
    {
        AcceptByUserRole::isDeniedAndRedirectHasRole(Role::STUDENT_NAME, 'cabinet');
        return view('client.cabinet.mentoring');
    }

    public function saveMentoring(MentoringSaveRequest $request)
    {
        AcceptByUserRole::isDeniedAndRedirectHasRole(Role::STUDENT_NAME, 'cabinet');
        $user = auth()->user();
        $user->is_accept_students = $request->is_accept_students == 'true';
        $user->is_service_payable = $request->has('is_service_payable');
        $user->service_price = $request->service_price;
        $user->save();
        return redirect()->back()->withSuccess('Успешно изменен');
    }

    public function reviews()
    {
        $user = \auth()->user();
        $user->full_name = $user->firstNameAndLetterLastNameCustom;
        $user->avatar = $user->avatar
            ? Storage::url(User::IMAGE_PATH . $user->avatar)
            : ($user->gender ? User::DEFAULT_MALE_IMAGE : User::DEFAULT_FEMALE_IMAGE);
        return view('client.cabinet.reviews', compact('user'));
    }

    public function favorites()
    {
        return view('client.cabinet.favorites');
    }

    public function certifications()
    {
        AcceptByUserRole::isDeniedAndRedirectHasRole(Role::STUDENT_NAME, 'cabinet');
        return view('client.cabinet.certifications');
    }

    public function saveCertifications()
    {
        AcceptByUserRole::isDeniedAndRedirectHasRole(Role::STUDENT_NAME, 'cabinet');
        return redirect()->back()->withSuccess('Успешно изменен');
    }

}
