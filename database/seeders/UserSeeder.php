<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id'    =>1,
                'name' => 'Admin',
                'username' => 'admin',
                'role' => 'admin',
                'password' => bcrypt('admin'),
                'is_active' => true,
            ],
            [
                'id'    =>2,
                'name' => 'penulis 1',
                'username' => 'penulis1',
                'role' => 'penulis',
                'password' => bcrypt('penulis1'),
                'is_active' => true,
            ],
            [
                'id'    =>3,
                'name' => 'penulis 2',
                'username' => 'penulis2',
                'role' => 'penulis',
                'password' => bcrypt('penulis2'),
                'is_active' => true,
            ],
            [
                'id'    =>4,
                'name' => 'agent 1A',
                'username' => 'agent1a',
                'role' => 'artikel',
                'password' => bcrypt('agent1a'),
                'is_active' => true,
            ],
            [
                'id'    =>5,
                'name' => 'agent 1B',
                'username' => 'agent1b',
                'role' => 'artikel',
                'password' => bcrypt('agent1b'),
                'is_active' => true,
            ],
            [
                'id'    =>6,
                'name' => 'agent 1C',
                'username' => 'agent1c',
                'role' => 'artikel',
                'password' => bcrypt('agent1c'),
                'is_active' => true,
            ],
            [
                'id'    =>7,
                'name' => 'warga-a',
                'username' => '3208285507900005',
                'role' => 'warga',
                'password' => bcrypt('19900715'),
                'is_active' => true,
            ],
            [
                'id'    =>8,
                'name' => 'warga-b',
                'username' => 'warga1b',
                'role' => 'warga',
                'password' => bcrypt('warga1b'),
                'is_active' => true,
            ],
        ]);
    }
}