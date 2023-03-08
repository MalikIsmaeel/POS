<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\countery;
class CounterySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        countery::create([
            'countery_name'=>'saudi arabia',
        'description'=>' ',
        'active'=>1,
        'user_id'=>1,
        ]);
    }
}
