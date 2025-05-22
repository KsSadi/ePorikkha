<?php

namespace Database\Seeders;

use App\Modules\Authentication\Models\User;
use App\Modules\Role\database\seeders\RoleSeeder;
use App\Modules\Role\database\seeders\UserSeeder;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RoleSeeder::class,
            UserSeeder::class
        ]);
    }
}
