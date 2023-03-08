<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\sub_city;
class SubCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sub_city::create([
            'sub_cities_name'=>'Nargis',
        'description'=>'',
        'active'=>1,
        'user_id'=>1,
        'city_id'=>1
        ]);
    }
}
