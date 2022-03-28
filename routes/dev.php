<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::prefix('commands')->group(function() {
    Route::get('optimize-clear', function () {
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        dd('ok');
    });
    Route::get('storage-link', function () {
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        dd('ok');
    });
});

Route::get('/', function () {
    $user = User::first();
    $user->getRoleNames();

    return view('welcome');

//    dd($users);
});
