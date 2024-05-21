<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([['name' => 'فئة 1'],
            ['name' => 'فئة 2'],
            ['name' => 'فئة 3'],
            ['name' => 'فئة 4'],
            ['name' => 'فئة 5'],
            ['name' => 'فئة 6'],
            ['name' => 'فئة 7'],
            ['name' => 'فئة 8'],
        ]);

    }
}
