<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\{AuthController, DonationRequestController, MainController, PostController, SendMessegeController};
use App\Models\Post;

// Route group for all front-end routes
Route::group([], function () {
    // Authentication
    Route::get('/register-form', [AuthController::class, 'registerForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login-form', [AuthController::class, 'loginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Donation Requests
    Route::get('/donation-requests', [DonationRequestController::class, 'index'])->name('donation.requests');
    Route::get('/donation-details/{id}', [DonationRequestController::class, 'donationDetails'])->name('donation.details');
    Route::get('/donation-create', [DonationRequestController::class, 'createDonation'])->name('donation.create');

    // Main Pages
    Route::match(['get', 'post'], '/home', [MainController::class, 'home'])->name('home');
    Route::get('/about-us', [MainController::class, 'aboutUs'])->name('about.us');
    Route::get('/contact-us', [MainController::class, 'contactUs'])->name('contact.us');

    // Posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/post/details/{id}', [PostController::class, 'postDetails'])->name('post.details');

    // Messages
    Route::post('/store-messege', [SendMessegeController::class, 'storeMessege'])->name('store.message');
});
