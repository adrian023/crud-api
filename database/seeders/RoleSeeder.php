<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = Role::create([
            'name' => 'user',
        ]);

        $dev = Role::create([
            'name' => 'developer',
        ]);
        
        $user->permissions()->attach([1,2,3]);
        $dev->permissions()->attach([1,2,3,4]);
    }
}
