<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeetingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'notification_settings_text' => 'Default notification settings text',
            'about_app' => 'Information about the app',
            'phone' => '123456789',
            'email' => 'example@example.com',
            'facebook_link' => 'https://www.facebook.com/example',
            'twitter_link' => 'https://twitter.com/example',
            'instagram_link' => 'https://www.instagram.com/example',
            
        ]);
    }
}
