<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ConatctTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact')->insert([
            'name' => 'User Contact',
            'email' => 'usercontacttest@gullygroup.in',
            'phone' => '1234567899',
            'subject'=>'welcome msg',
            'message'=>'hello',
        ]);
    }
}
