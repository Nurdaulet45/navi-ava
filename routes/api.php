<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('cabinet/reviews', [UserController::class, 'getReviews']);
    Route::get('cabinet/reviewed-reviews', [UserController::class, 'getReviewedReviews']);
    Route::get('cabinet/about-me-reviews', [UserController::class, 'getAboutMeReviews']);
    Route::get('cabinet/certifications', [UserController::class, 'getCertifications']);
    Route::post('cabinet/certifications', [UserController::class, 'saveCertifications']);
    Route::delete('cabinet/certifications/{id}', [UserController::class, 'deleteCertifications']);
    Route::post('cabinet/reviews/reply', [UserController::class, 'saveReply']);
});
