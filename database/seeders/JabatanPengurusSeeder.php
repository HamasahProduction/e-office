<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanPengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('jabatan_pengurus')->insert([
            [
                'nama_jabatan' => 'Ketua BPD',
            ],
            [
                'nama_jabatan' => 'Ketua LPM',
            ],
            [
                'nama_jabatan' => 'Ketua PKK',
            ],
            [
                'nama_jabatan' => 'Ketua Karang Taruna',
            ],
            [
                'nama_jabatan' => 'Ketua BUMDES',
            ],
        ]);
    }
}
