<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BloodTypeController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\DonationRequestController;
use App\Http\Controllers\Api\EmailController;
use App\Http\Controllers\Api\GovernorateController;
use App\Http\Controllers\Api\NotificationSettingsController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SettingController;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register' ,[AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
Route::get('/governorates', [GovernorateController::class, 'index']);
Route::get('/cities', [CityController::class, 'index']);
Route::get('/governorates-cities', [GovernorateController::class, 'governoratesWithItisCities']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/settings', [SettingController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/blood-types', [BloodTypeController::class, 'index']);
Route::get('/donation-requests', [DonationRequestController::class, 'index']);
Route::get('/donation-request/{id}', [DonationRequestController::class, 'show']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'show']);


Route::group(['middleware' => 'auth:api'], function(){

    Route::post('/profile', [ClientController::class, 'profile']);
    Route::post('/create-donation-request', [DonationRequestController::class, 'store']);
    Route::post('/post/{post_id}/favorite', [PostController::class, 'toggleFavorite']);
    Route::get('/favorite-posts', [PostController::class, 'favoritePosts']);
    
    Route::post('/notification-settings/update', [NotificationSettingsController::class, 'update']);


});



