<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatogerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = [
    'Clothing' => ['Woman Shoes', 'Men\'s Shirts'],
    'Handy' => ['Smartphones', 'Smartwatches ']
];

foreach ($data as $category => $subCategories)
{
    $id = Category::create(['name' => $category])->id;

    foreach ($subCategories as $subCategory) {
        SubCategory::create([
            'parent_id' => $id,
            'name' => $subCategory
        ]);
    }
}
    }
}
