<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insertGetId([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('admin@123'),
            'mobile' => '9853192166',
            'age' => 50,
            'userType' => 1,
            'profilePicture' => '',
            'description' => 'superadmin test 1',
            'status' => 1,
        ]); 
    }
}
