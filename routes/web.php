<?php

use App\Models\City;
use App\Models\Category;
use App\Models\DonationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\PostController;
// use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\ClientController;
// use App\Http\Controllers\ContactController;
// use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Front\AuthController;
// use App\Http\Controllers\Front\DonationRequestController;
use App\Http\Controllers\Front\MainController;
use App\Http\Controllers\GovarnorateController;
use App\Http\Controllers\Api\BloodTypeController;
// use App\Http\Controllers\DonationRequestController;
use App\Http\Controllers\Front\DonationRequestCotroller;
// use App\Http\Controllers\Front\DonationRequestController;
use App\Http\Controllers\Front\DonationRequestController;
use App\Http\Controllers\Front\ContactCotroller;
// use App\Http\Controllers\Front\SettingCotroller;
use App\Http\Controllers\Front\SettingCotroller;
use App\Http\Controllers\Front\PostCotroller;
use App\Http\Controllers\Front\DonationRequestController as FrontDonationRequestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Front.home');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




require __DIR__ . '\front.php';
require __DIR__ . '\dashboard.php';


