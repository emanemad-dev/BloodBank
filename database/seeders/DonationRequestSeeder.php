<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonationRequestSeeder extends Seeder
{
    public function run()
    {
        // Generate 10 fake donation requests
        for ($i = 1; $i <= 10; $i++) {
            DB::table('donation_requests')->insert([
                'patient_name' => 'Patient ' . $i,
                'patient_phone' => '123456789', // Replace with actual phone number data
                'city_id' => rand(1, 10), // Assuming you have cities in your database
                // 'city_id' => 3,
                'hospital_name' => 'Hospital ' . $i,
                'blood_type_id' => rand(1, 8), // Assuming you have blood types in your database
                'age' => rand(20, 60), // Random age
                'bags_num' => rand(1, 5), // Random number of bags
                'details' => 'Details for request ' . $i,
                'hospital_address' => 'Address ' . $i,
                'latitude' => '12.34567', // Replace with actual latitude data
                'longitude' => '23.45678', // Replace with actual longitude data
                'client_id' => rand(1, 10), // Assuming you have clients in your database
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
