<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       city::create([
        'city_name'=>'Riyadh',
        'description'=>'',
        'active'=>1,
        'user_id'=>1,
        'countery_id'=>1
       ]);
    }
}
