<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DoctorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor = DB::table('doctors')->insert([
            'name' => 'Test Doctor',
            'email'=>'testdoc1@gullygroup.in',
            'mobile'=>'1234567890',
            'gender'=>'M',
            'address'=>'0, kanpur',
            'pincode'=>'208017',
            'city'=>'Kanpur',
            'department'=>'Ear Specialist',
            'govt_id_type'=>'aadhar',
            'id_number'=>'252525874896',
            'profile_image'=>'',
            'professional_image'=>'',
            'password'=>Hash::make('123456'),

        ]);
        if($doctor==true){
            User::create([
                'name' => 'Test Doctor',
                'email' => 'testdoc1@gullygroup.in',
                'password' => Hash::make('123456'),
                'mobile'=>'1234567890',
                'type'=>'2',
            ]);

        }
    }
}
