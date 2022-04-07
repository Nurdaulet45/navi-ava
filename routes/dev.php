<?php

use App\Models\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::prefix('commands')->group(function () {
    Route::get('optimize-clear', function () {
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        dd('ok');
    });
    Route::get('storage-link', function () {
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        dd('ok');
    });
});

//Route::group(['prefix' => 'commands', 'middleware' => 'auth'], function () {
Route::get('sockets/serve', function () {
    Artisan::call('websockets:serve');
    dd('ok');
});
//});

Route::get('/', function () {
    $user = User::first();
    $user->getRoleNames();

    return view('welcome');

//    dd($users);
});
