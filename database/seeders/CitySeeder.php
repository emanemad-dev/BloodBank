<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'القاهرة', 'governorate_id' => 1],
            ['name' => 'الجيزة', 'governorate_id' => 1],
            ['name' => 'الشيخ زايد', 'governorate_id' => 1],
            ['name' => 'المعادي', 'governorate_id' => 1],
            ['name' => 'التجمع الخامس', 'governorate_id' => 1],
            ['name' => 'مدينتي', 'governorate_id' => 1],
            ['name' => 'الإسكندرية', 'governorate_id' => 2],
            ['name' => 'المنصورة', 'governorate_id' => 6],
            ['name' => 'طنطا', 'governorate_id' => 4],
            ['name' => 'بنها', 'governorate_id' => 3],

            ['name' => 'الزقازيق', 'governorate_id' => 5],
            ['name' => 'العاشر من رمضان', 'governorate_id' => 5],
            ['name' => 'بلبيس', 'governorate_id' => 5],
            ['name' => 'منيا القمح', 'governorate_id' => 5],
            ['name' => 'ههيا', 'governorate_id' => 5],
            ['name' => 'أبو حماد', 'governorate_id' => 5],
            ['name' => 'الصالحية الجديدة', 'governorate_id' => 5],

            ['name' => 'السويس', 'governorate_id' => 7],

            ['name' => 'المنيا', 'governorate_id' => 8],
            ['name' => 'أبو قرقاص', 'governorate_id' => 8],
            ['name' => 'مطاي', 'governorate_id' => 8],
            ['name' => 'ملوي', 'governorate_id' => 8],
            ['name' => 'سمالوط', 'governorate_id' => 8],

        ];


        DB::table('cities')->insert($cities);
    }
}
