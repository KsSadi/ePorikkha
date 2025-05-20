<?php

namespace App\Modules\Role\database\seeders;

use App\Modules\Role\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create your 4 user types
        Role::create([
            'name' => 'Administrator',
            'slug' => 'admin',
            'description' => 'System administrator with full access',
        ]);

        Role::create([
            'name' => 'Organizer',
            'slug' => 'organizer',
            'description' => 'Organizer with limited administrative access',
        ]);

        Role::create([
            'name' => 'Evaluator',
            'slug' => 'evaluator',
            'description' => 'Evaluator with content management access',
        ]);

        Role::create([
            'name' => 'Participant',
            'slug' => 'participant',
            'description' => 'Participant user with basic access',
        ]);
    }
}
