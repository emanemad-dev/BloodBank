<?php

namespace App\Providers;

use App\Models\BloodType;
use App\Models\City;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $settings=Setting::first();
        $posts=Post::all();
        $bloodTypes=BloodType::all();
        $cities=City::all();
        $governorates = Governorate::all();
        $donationRequests = DonationRequest::all();
        view()->share(compact('settings','posts', 'bloodTypes', 'cities', 'donationRequests', 'governorates'));
    }
}
