<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_type')->insert([
            'type' => 'Admin'
        ]);
        DB::table('users_type')->insert([
            'type' => 'Doctor'
        ]);
        DB::table('users_type')->insert([
            'type' => 'User'
        ]);
    }
}
