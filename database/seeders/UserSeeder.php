<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $gender=array("male"=>"male","female"=>"female");
        $role=array("Patient"=>"Patient","Doctor"=>"Doctor", 'Employee' => 'Employee');
        $status_array=array("Active"=>"Active","Inactive"=>"Inactive", 'Disable' => 'Disable');
        $blood_group = array(
            'A+' => 'A+', 'A-' => 'A-',
            'B+' => 'B+', 'B-' => 'B-',
            'AB+' => 'AB+', 'AB-' => 'AB-',
            'O+' => 'O+', 'O-' => 'O-',
        );
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'gender' => array_rand($gender,1),
            'blood_group' => array_rand($blood_group,1),
            'status' => array_rand($status_array,1),
            'role' => array_rand($role,1),
        ]);
    }
}