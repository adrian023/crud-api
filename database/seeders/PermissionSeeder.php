<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            [
                'name' => 'create',
            ],
            [
                'name' => 'delete',
            ],
            [
                'name' => 'update',
            ],
            [
                'name' => 'assign_complete',
            ],
        ]);
    }
}
