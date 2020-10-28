<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'doctor']);
        Role::create(['name' => 'patient']);
        User::create([
            'name' => 'Super Admin',
            'role_id' => 1,
            'address' => 'Cairo',
            'phone_number' => '01009896803',
            'department' => 'dentist',
            'image' => '',
            'education' => 'mti',
            'description' => 'good doctor',
            'email' => 'superadmin@str.com',
            'password' => bcrypt('123456'),
            'gender' => 'male'
        ]);
    }
}
