<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'role' => 'admin',
            'phone' => '0583894758',
            'address' => 'TP HCM',
            'dob' => '2005-08-05',
            'is_public' => false,
        ]);


        

        
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => "Employee $i",
                'email' => "employee$i@gmail.com",
                'username' => "employee$i",
                'password' => Hash::make('123456'),
                'role' => 'employee',
                'phone' => '0927487346',
                'address' => 'TP HCM',
                'dob' => '2005-05-08',
                'is_public' => true,
            ]);
        }
    }
}
