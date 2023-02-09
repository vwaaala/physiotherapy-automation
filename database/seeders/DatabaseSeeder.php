<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $gender=array("male"=>"male","female"=>"female");
        // $role=array("Patient"=>"Patient","Doctor"=>"Doctor", 'Employee' => 'Employee');
        // $status_array=array("Active"=>"Active","Inactive"=>"Inactive", 'Disable' => 'Disable');
        // $blood_group = array(
        //     'A+' => 'A+', 'A-' => 'A-',
        //     'B+' => 'B+', 'B-' => 'B-',
        //     'AB+' => 'AB+', 'AB-' => 'AB-',
        //     'O+' => 'O+', 'O-' => 'O-',
        // );

        // for($j = 1; $j < 1000; $j++){
        //     for($i = 0; $i < 1000; $i++){
        //         $user_data[] = [
        //             'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),
        //     'gender' => array_rand($gender,1),
        //     'blood_group' => array_rand($blood_group,1),
        //     'status' => array_rand($status_array,1),
        //     'role' => array_rand($role,1),
        //         ];
        //     }

        //     User::insert($user_data);
        // }
    }
}
