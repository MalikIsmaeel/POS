<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        // $this->call(userseeder::class);

        $this->call(UnitSeeder::class);
        $this->call(CounterySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(SubCitySeeder::class);
        $this->call(OptionSeeder::class);
        $this->call(StoreMstrSeeder::class);
        $this->call(StoreDtlSeeder::class);
    }
}
