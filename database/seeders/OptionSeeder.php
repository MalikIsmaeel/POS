<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\option;
class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        option::create([
            'option_name'=>'type_id',
            'option_table'=>'store',
            'option_value'=>'POS'
        ]);
        option::create([
            'option_name'=>'tax(15%)',
            'option_table'=>'products',
            'option_value'=>'15%'
        ]);
    }
}
