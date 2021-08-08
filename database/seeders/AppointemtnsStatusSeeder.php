<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppointmentStatus;

class AppointemtnsStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppointmentStatus::create([
            'name'=>'قيد الانشاء'
        ]);
        AppointmentStatus::create([
            'name'=>'معتمد'
        ]);
        AppointmentStatus::create([
            'name'=>'ملغي'
        ]);
        AppointmentStatus::create([
            'name'=>'تمت الزيارة'
        ]);
    }
}
