<?php
// database/seeders/UsersSeeder.php

namespace App\Modules\Role\database\seeders;

use App\Modules\Authentication\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Md. Rahman',
                'email' => 'admin@eporikkha.edu.bd',
                'role' => 'admin',
                'status' => 'active',
                'institution' => 'System Admin',
                'points' => 999999,
                'last_activity' => now()
            ],
            [
                'name' => 'Dr. Rashida Begum',
                'email' => 'dr.rashida@dhakacolege.edu.bd',
                'role' => 'instructor',
                'status' => 'active',
                'institution' => 'Dhaka College',
                'points' => 1250,
                'last_activity' => now()->subMinutes(15)
            ],
            [
                'name' => 'Prof. Mahbub Alam',
                'email' => 'mahbub.alam@notredame.edu.bd',
                'role' => 'evaluator',
                'status' => 'active',
                'institution' => 'Notre Dame College',
                'points' => 875,
                'last_activity' => now()->subHour()
            ],
            [
                'name' => 'Rahul Ahmed',
                'email' => 'rahul.ahmed.2024@student.edu.bd',
                'role' => 'student',
                'status' => 'active',
                'institution' => 'RAJUK Uttara Model College',
                'points' => 0,
                'last_activity' => now()->subHours(3)
            ],
            [
                'name' => 'Fatima Khan',
                'email' => 'fatima.khan@instructor.edu.bd',
                'role' => 'instructor',
                'status' => 'pending',
                'institution' => 'Viqarunnisa Noon College',
                'points' => 500,
                'last_activity' => now()->subDay()
            ],
            [
                'name' => 'Sadia Islam',
                'email' => 'sadia.islam.2024@student.edu.bd',
                'role' => 'student',
                'status' => 'suspended',
                'institution' => 'Holy Cross College',
                'points' => 0,
                'last_activity' => now()->subDays(2)
            ]
        ];

        foreach ($users as $userData) {
            User::create(array_merge($userData, [
                'password' => Hash::make('password123'),
                'email_verified_at' => now()
            ]));
        }

        // Create additional sample users
    }
}
