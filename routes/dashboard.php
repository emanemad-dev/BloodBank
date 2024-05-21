<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\{GovarnorateController, CityController, PostController, ClientController, ContactController, SettingController, CategoryController, DonationRequestController};

// Dashboard Routes with Prefix

Route::prefix('dashboard')->group(function () {

    // Resource Routes for CRUD operations
    Route::resource('govarnorates', GovarnorateController::class);
    Route::resource('cities', CityController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('posts', PostController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('donation-requests', DonationRequestController::class);

    // Additional Client Actions (outside resource)
    Route::post('clients/{id}/activate', [ClientController::class, 'activate'])->name('clients.activate');
    Route::post('clients/{id}/deactivate', [ClientController::class, 'deactivate'])->name('clients.deactivate');
});
