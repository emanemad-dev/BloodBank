<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Contact::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '123456789',
            'messege' => 'This is a test message.',
            'subject'=>'Test Subject'
        ]);
    }
}
