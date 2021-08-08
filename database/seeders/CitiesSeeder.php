<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name'=>'شمال غزة'
        ]);
        City::create([
            'name'=>'غزة'
        ]);
        City::create([
            'name'=>'الوسطى'
        ]);
        City::create([
            'name'=>'خانيونس'
        ]);
        City::create([
            'name'=>'رفح'
        ]);
    }
}
