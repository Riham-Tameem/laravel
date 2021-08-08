<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Link;

class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //التخصصات
        $link = Link::create([
            'title'=>'التخصصات',
            'route'=>'',
            'parent_id'=>0,
            'show_in_menu'=>1,
            'active'=>1,
            'order'=>1,            
        ]);
        Link::create([
            'title'=>'ادارة التخصصات',
            'route'=>'speciality.index',
            'parent_id'=>$link->id,
            'show_in_menu'=>1,
            'active'=>1,
            'order'=>1,            
        ]);
        Link::create([
            'title'=>'اضافة تخصص',
            'route'=>'speciality.create',
            'parent_id'=>$link->id,
            'show_in_menu'=>1,
            'active'=>1,
            'order'=>1,            
        ]);
        //المرضى
        $link = Link::create([
            'title'=>'المرضى',
            'route'=>'',
            'parent_id'=>0,
            'show_in_menu'=>1,
            'active'=>1,
            'order'=>1,            
        ]);
        Link::create([
            'title'=>'ادارة المرضى',
            'route'=>'patient.index',
            'parent_id'=>$link->id,
            'show_in_menu'=>1,
            'active'=>1,
            'order'=>1,            
        ]);
        Link::create([
            'title'=>'اضافة مريض',
            'route'=>'patient.create',
            'parent_id'=>$link->id,
            'show_in_menu'=>1,
            'active'=>1,
            'order'=>1,            
        ]);
        //الاطباء
        $link = Link::create([
            'title'=>'الاطباء',
            'route'=>'',
            'parent_id'=>0,
            'show_in_menu'=>1,
            'active'=>1,
            'order'=>1,            
        ]);
        Link::create([
            'title'=>'ادارة الاطباء',
            'route'=>'doctor.index',
            'parent_id'=>$link->id,
            'show_in_menu'=>1,
            'active'=>1,
            'order'=>1,            
        ]);
        Link::create([
            'title'=>'اضافة طبيب',
            'route'=>'doctor.create',
            'parent_id'=>$link->id,
            'show_in_menu'=>1,
            'active'=>1,
            'order'=>1,            
        ]);
        //الحجوازت
        $link = Link::create([
            'title'=>'الحجوزات',
            'route'=>'',
            'parent_id'=>0,
            'show_in_menu'=>1,
            'active'=>1,
            'order'=>1,            
        ]);
         Link::create([
            'title'=>'الرئيسية',
            'route'=>'patient-appointment.index',
            'parent_id'=>$link->id,
            'show_in_menu'=>1,
            'active'=>1,
            'order'=>1,            
        ]);
        Link::create([
            'title'=>'ادارة الحجوزات',
            'route'=>'appointment.index',
            'parent_id'=>$link->id,
            'show_in_menu'=>1,
            'active'=>1,
            'order'=>1,            
        ]);
        Link::create([
            'title'=>'اضافة حجز جديد',
            'route'=>'appointment.create',
            'parent_id'=>$link->id,
            'show_in_menu'=>1,
            'active'=>1,
            'order'=>1,            
        ]);

        
        //المستخدمين
        $link = Link::create([
            'title'=>'المستخدمين',
            'route'=>'',
            'parent_id'=>0,
            'show_in_menu'=>1,
            'active'=>1,
            'order'=>1,            
        ]);
        Link::create([
            'title'=>'ادارة المستخدمين',
            'route'=>'user.index',
            'parent_id'=>$link->id,
            'show_in_menu'=>1,
            'active'=>1,
            'order'=>1,            
        ]);
        Link::create([
            'title'=>'اضافة مستخدم',
            'route'=>'user.create',
            'parent_id'=>$link->id,
            'show_in_menu'=>1,
            'active'=>1,
            'order'=>1,            
        ]);
    }
}
