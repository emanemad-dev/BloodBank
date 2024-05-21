<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\City;
use App\Models\Post;
use App\Models\Category;
use App\Models\Governorate;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\SeetingsSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\BloodTypeSeeder;
use Database\Seeders\ContactSeeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\GovarnorateSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {



        // $this->call(BloodTypeSeeder::class);
        $this->call(CategorySeeder::class);
        // $this->call(PostSeeder::class);
        // $this->call(GovarnorateSeeder::class);
        // $this->call(CitySeeder::class);
        // $this->call(ContactSeeder::class);
        // $this->call(SeetingsSeeder::class);
        // $this->call(DonationRequestSeeder::class);

    }
}
