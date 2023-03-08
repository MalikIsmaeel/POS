<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\store_dtl;
class StoreDtlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        store_dtl::create([
            'qty'=>100,
            'price'=>15,
            'cost'=>15 ,
            'active'=>1,
            'product_name'=>'bnana',
            'store_name'=>1,
        
            'unit_id'=>1,
            'tax_id'=>2,
            'user_id'=>1,
            'catogery_id'=>1
        ]);
        store_dtl::create([
            'qty'=>100,
            'price'=>10,
            'cost'=>10 ,
            'active'=>1,
            'product_name'=>'Apple',
            'store_name'=>1,
            
         
            'unit_id'=>1,
            'tax_id'=>2,
            'user_id'=>1,
            'catogery_id'=>1
        ]);
    }
}
