<?php

use App\Events\WebsocketDemoEvent;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/', function (){
//    broadcast(new WebsocketDemoEvent('some data'));
    return view('client.index');
})->name('index');

Route::get('/blog-post', [BlogController::class, 'show'])->name('blog-post');

Route::group(['prefix' => 'mentors', 'as' => 'mentors.'], function () {
    Route::get('/', [MainController::class, 'mentors'])->name('index');
    Route::get('/mentor/{id}', [MainController::class, 'mentor'])->name('mentor');
});

Route::group(['prefix' => 'consultants', 'as' => 'consultants.'], function () {
    Route::get('/', [MainController::class, 'consultants'])->name('index');
    Route::get('/consultant/{id}', [MainController::class, 'consultant'])->name('consultant');
});

Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
    Route::get('/', [MainController::class, 'students'])->name('index');
    Route::get('/consultant/{id}', [MainController::class, 'student'])->name('student');
});

Route::view('/catalog-free', 'client.catalog-free')->name('catalog-free');
Route::view('/blog', 'client.blog')->name('blog');
Route::view('/login', 'client.index')->name('login');
Route::view('/register', 'client.index')->name('register');

Route::prefix('cabinet')->middleware('auth:web')->name('cabinet')->group(function () {
    Route::get('/session-login-as', [UserController::class, 'sessionLoginAs'])->name('.sessionLoginAs');
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
    Route::post('/reviews/save', [UserController::class, 'saveReviews'])->name('.reviews.save');
    Route::post('/reviews/update', [UserController::class, 'updateReviews'])->name('.reviews.update');
    Route::post('/reviews/answer/save', [UserController::class, 'saveAnswerReviews'])->name('.reviews.answer.save');

    Route::get('/favorites', [UserController::class, 'favorites'])->name('.favorites');
    Route::post('/favorite/save', [UserController::class, 'saveFavorite'])->name('.favorite.save');
    Route::post('/favorite/delete', [UserController::class, 'deleteFavorite'])->name('.favorite.delete');
    Route::get('/certifications', [UserController::class, 'certifications'])->name('.certifications');
    Route::post('/certifications', [UserController::class, 'saveCertifications'])->name('.saveCertifications');

    Route::get('/chats', [UserController::class, 'chats'])->name('.chats');
    Route::get('/chats/contacts', [UserController::class, 'contacts'])->name('.contacts');
    Route::get('/chats/contact/{id}', [UserController::class, 'contact'])->name('.contact');
    Route::get('/chats/conversation/{id}', [UserController::class, 'getMessageFor'])->name('.getMessageFor');
    Route::post('/chats/conversation/send', [UserController::class, 'sendMessage'])->name('.sendMessage');

    Route::get('/change-mail', [UserController::class, 'changeMail'])->name('.changeMail');
    Route::post('/change-mail', [UserController::class, 'saveChangeMail'])->name('.saveChangeMail');
    Route::get('/change-password', [UserController::class, 'changePassword'])->name('.changePassword');
    Route::post('/change-password', [UserController::class, 'saveChangePassword'])->name('.saveChangePassword');
    Route::get('/setting-notification', [UserController::class, 'settingNotification'])->name('.settingNotification');
    Route::post('/setting-notification', [UserController::class, 'saveSettingNotification'])->name('.saveSettingNotification');

    Route::get('/account-activate', [UserController::class, 'accountActivate'])->name('.accountActivate');
    Route::get('/', [UserController::class, 'cabinet']);
});


Route::get('/about-service', function () {
    return view('client.about-service');
})->name('aboutService');

Route::get('/contacts', function () {
    return view('client.contacts');
})->name('contacts');

Route::prefix('support')->name('support')->group(function () {
    Route::get('/', [SupportController::class, 'index']);
    Route::post('/question', [SupportController::class, 'storeQuestion'])->name('.storeQuestion');
});

Route::get('/privacy-policy', function () {
    return view('client.privacy-policy');
})->name('privacyPolicy');
Route::get('/terms-use', function () {
    return view('client.terms-use');
})->name('termsUse');
Route::get('/service-rules', function () {
    return view('client.service-rules');
})->name('serviceRules');

Route::prefix('ajax')->group(function () {
    Route::post('login', [AuthController::class, 'loginAjax'])->name('login.ajax');
//    Route::post('check-email', [AuthController::class, 'checkEmailAjax'])->name('check_email.ajax');
    Route::post('reset-password-email', [AuthController::class, 'resetPasswordSendEmail'])->name('reset_password.ajax');
    Route::post('register', [AuthController::class, 'registerAjax'])->name('register.ajax');
});
Route::prefix('password')->group(function () {
    Route::get('reset/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');
    Route::post('reset', [AuthController::class, 'resetPasswordUpdate'])->name('password.update');
});

Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verifyEmail');
Route::get('/lang/switch', [MainController::class, 'langSwitch'])->name('lang.switch');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/download-file', [DownloadController::class, 'downloadFile'])->name('downloadFile');
