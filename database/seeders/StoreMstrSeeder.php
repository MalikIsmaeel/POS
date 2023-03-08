<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\store_mstr;
class StoreMstrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        store_mstr::create([
            'storecode'=>'mian POS',
            'type_id'=>1,
           'sub_city_id'=>1,
           'user_id'=>1,
        'active'=>1
        ]);
    }
}
