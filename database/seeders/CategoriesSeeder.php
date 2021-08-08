<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=> 'Political',
            'active' => 1
        ]);
        Category::create([
            'name'=> 'Economic',
            'active' => 1
        ]);
        Category::create([
            'name'=> 'Sports',
            'active' => 1
        ]);
    }
}