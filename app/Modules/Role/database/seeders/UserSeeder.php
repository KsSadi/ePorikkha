<?php

namespace App\Modules\Role\database\seeders;

use App\Modules\Authentication\Models\User;
use App\Modules\Role\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        // Assign admin role
        $adminRole = Role::where('slug', 'admin')->first();
        if ($adminRole) {
            $admin->assignRole($adminRole);
        }

        // Create organizer user (assuming organizer is another role)
        $organizer = User::create([
            'name' => 'Organizer User',
            'email' => 'organizer@example.com',
            'password' => Hash::make('password'),
        ]);

        // Assign organizer role
        $organizerRole = Role::where('slug', 'organizer')->first();
        if ($organizerRole) {
            $organizer->assignRole($organizerRole);
        }
    }

}
