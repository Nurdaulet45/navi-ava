<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/catalog', function() {
    return view('client.catalog');
})->name('catalog');
Route::get('/catalog-free', function() {
    return view('client.catalog-free');
})->name('catalog-free');
Route::get('/mentor', function() {
    return view('client.mentor');
})->name('mentor');
Route::get('/mentor-free', function() {
    return view('client.mentor-free');
})->name('mentor');
Route::get('/blog', function() {
    return view('client.blog');
})->name('blog');
Route::get('/blog-post', function() {
    return view('client.blog-post');
})->name('blog-post');

Route::get('/login', fn() => redirect()->route('index'))->name('login');
Route::get('/register', fn() => redirect()->route('index'))->name('register');

Route::prefix('cabinet')->middleware('auth:web')->name('cabinet')->group(function () {
    Route::get('/about-me', [UserController::class, 'aboutMe'])->name('.aboutMe');
    Route::post('/about-me', [UserController::class, 'saveAboutMe'])->name('.saveAboutMe');
    Route::get('/about-me/delete-prof-header-image', [UserController::class, 'deleteProfileHeaderImage'])->name('.deleteProfileHeaderImage');
    Route::get('/about-me/delete-profile', [UserController::class, 'deleteProfile'])->name('.deleteProfile');
    Route::post('/send-email-verify', [UserController::class, 'sendVerifyEmail'])->name('.sendVerifyEmail.ajax');

    Route::get('/specialization', [UserController::class, 'specialization'])->name('.specialization');
    Route::post('/specialization', [UserController::class, 'saveSpecialization'])->name('.saveSpecialization');


    Route::get('/mentoring', [UserController::class, 'mentoring'])->name('.mentoring');
    Route::post('/mentoring', [UserController::class, 'saveMentoring'])->name('.saveMentoring');
    Route::get('/reviews', [UserController::class, 'reviews'])->name('.reviews');
    Route::get('/favorites', [UserController::class, 'favorites'])->name('.favorites');
    Route::get('/certifications', [UserController::class, 'certifications'])->name('.certifications');
    Route::post('/certifications', [UserController::class, 'saveCertifications'])->name('.saveCertifications');


    Route::get('/change-mail', [UserController::class, 'changeMail'])->name('.changeMail');
    Route::post('/change-mail', [UserController::class, 'saveChangeMail'])->name('.saveChangeMail');
    Route::get('/change-password', [UserController::class, 'changePassword'])->name('.changePassword');
    Route::post('/change-password', [UserController::class, 'saveChangePassword'])->name('.saveChangePassword');
    Route::get('/setting-notification', [UserController::class, 'settingNotification'])->name('.settingNotification');
    Route::post('/setting-notification', [UserController::class, 'saveSettingNotification'])->name('.saveSettingNotification');

    Route::get('/', [UserController::class, 'cabinet']);
});



Route::get('/about-service', function() {
    return view('client.about-service');
})->name('aboutService');

Route::get('/contacts', function() {
    return view('client.contacts');
})->name('contacts');
Route::get('/support', function() {
    return view('client.support');
})->name('support');

Route::get('/privacy-policy', function() {
    return view('client.privacy-policy');
})->name('privacyPolicy');
Route::get('/terms-use', function() {
    return view('client.terms-use');
})->name('termsUse');
Route::get('/service-rules', function() {
    return view('client.service-rules');
})->name('serviceRules');

Route::prefix('ajax')->group(function () {
    Route::post('login', [AuthController::class, 'loginAjax'])->name('login.ajax');
    Route::post('check-email', [AuthController::class, 'checkEmailAjax'])->name('check_email.ajax');
    Route::post('reset-password-email', [AuthController::class, 'resetPasswordSendEmail'])->name('reset_password.ajax');
    Route::post('register', [AuthController::class, 'registerAjax'])->name('register.ajax');
});
Route::prefix('password')->group(function () {
    Route::get('reset/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');
    Route::post('reset', [AuthController::class, 'resetPasswordUpdate'])->name('password.update');
});
Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verifyEmail');

Route::get('lang/switch', [MainController::class, 'langSwitch'])->name('lang.switch');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('download-file', [DownloadController::class, 'downloadFile'])->name('downloadFile');
