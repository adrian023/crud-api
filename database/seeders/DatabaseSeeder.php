<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);

        // User::factory(10)->create();
        User::create([
            'name' => 'Adrian',
            'email' => 'fabonanadr@gmail.com',
            'role_id' => 1,
            'password' => Hash::make('Adrian_023'),
        ]);

        User::create([
            'name' => 'Fabs',
            'email' => 'adrfabonan@gmail.com',
            'role_id' => 2,
            'password' => Hash::make('Adrian_023'),
        ]);


        Task::factory(10)->create();


    }
}
