<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
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

Route::prefix('cabinet')->name('cabinet')->group(function () {
    Route::get('/about-me', function() {
        return view('client.cabinet.about-me');
    })->name('.about-me');

    Route::get('/specialization', function() {
        return view('client.cabinet.specialization');
    })->name('.specialization');

    Route::get('/mentoring', function() {
        return view('client.cabinet.mentoring');
    })->name('.mentoring');

    Route::get('/reviews', function() {
        return view('client.cabinet.reviews');
    })->name('.reviews');

    Route::get('/favorites', function() {
        return view('client.cabinet.favorites');
    })->name('.favorites');

    Route::get('/certifications', function() {
        return view('client.cabinet.certifications');
    })->name('.certifications');

    Route::get('/change-mail', function() {
        return view('client.cabinet.change-mail');
    })->name('.changeMail');
    Route::get('/change-password', function() {
        return view('client.cabinet.change-password');
    })->name('.changePassword');

    Route::get('/setting-notification', function() {
        return view('client.cabinet.setting-notification');
    })->name('.settingNotification');

    Route::get('/', function() {
        return view('client.cabinet.index');
    });
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
    Route::post('reset-password-email', [AuthController::class, 'resetPasswordSendEmail'])->name('reset_password.ajax');
    Route::post('register', [AuthController::class, 'registerAjax'])->name('register.ajax');
});
Route::prefix('password')->group(function () {
    Route::get('reset/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');
    Route::post('reset', [AuthController::class, 'resetPasswordUpdate'])->name('password.update');
});
Route::get('lang/switch', [MainController::class, 'langSwitch'])->name('lang.switch');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('download-file', [DownloadController::class, 'downloadFile'])->name('downloadFile');
