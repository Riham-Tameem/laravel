<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Link;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Role::create([
            'name'=>'admin'
        ]);
        Role::create([
            'name'=>'doctor'
        ]);
        Role::create([
            'name'=>'patient'
        ]);*/
        $user = User::create([
            'email'=>'admin@aa.com',
            'name' =>'System Admin',
            'password' => bcrypt('123456789')
        ]);
        $user->assignRole('admin');
        $links = Link::all();
        foreach($links as $link){
            \DB::table('user_links')->insert([
                'link_id'=>$link->id,
                'user_id'=>$user->id,
                'created_at'=>new \DateTime(),
                'updated_at'=>new \DateTime(),
            ]);
        }
    }}