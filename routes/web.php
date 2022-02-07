<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
Route::get('/cabinet', function() {
    return view('client.cabinet.index');
})->name('cabinet');

Route::get('/about-me', function() {
    return view('client.cabinet.about-me');
})->name('about-me');


Route::get('/about-service', function() {
    return view('client.about-service');
})->name('about-service');
