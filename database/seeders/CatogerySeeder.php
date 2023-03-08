<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\catogery;
class CatogerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   
   catogery::create([
    'catogery_name'=>'fruts',
    'description'=>'',
    'active'=>1,
    'user_id'=>1]);

   




    }
}
