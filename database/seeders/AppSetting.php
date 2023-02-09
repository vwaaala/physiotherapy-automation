<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AppSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_settings')->insert([
            'company_name' => 'Sp Physiopoint',
            'contact_person' => 'Al-amin Prince',
            'address' => '31/35A Doctor para',
            'city' => 'Khulna',
            'police_station' => 'Sonadanga',
            'postal_code' => '9100',
            'email' => 'vwaaala@gmail.com',
            'primary_phone' => '+8801711336179',
            'secondary_phone' => '+8801745265935',
            'facebook_url' => 'https://www.facebook.com',
        ]);
    }
}
        
