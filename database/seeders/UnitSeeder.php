<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\unit;
class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        unit::create([
         'unit_name'=>'PCS',
    'no_of_units'=>1,
'active'=>1,
'user_id'=>1,

        ]);
    }
}
