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
            'phone' => '0123456789',
            'address' => 'Company HQ',
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
                'phone' => '0987654321',
                'address' => '123 Street, City',
                'dob' => '1995-05-05',
                'is_public' => false,
            ]);
        }
    }
}
