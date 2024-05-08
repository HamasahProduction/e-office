<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKepindahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        \DB::table('jenis_kepindahan')->insert([
            [
                'keterangan' => 'Kep. Keluarga',
            ],
            [
                'keterangan' => 'Kep. Keluarga & Seluruh Anggota Keluarga',
            ],
            [
                'keterangan' => 'Kep. Keluarga & Sbg. Anggota Keluarga',
            ],
            [
                'keterangan' => 'Anggota Keluarga',
            ],
        ]);
    }
}
