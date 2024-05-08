<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusKKYangPindahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('status_nokk_bg_yg_pindah')->insert([
            [
                'keterangan' => 'Numpang KK',
            ],
            [
                'keterangan' => 'Membuat KK Baru',
            ],
            [
                'keterangan' => 'Nama Kep. Keluarga dan Nomor KK Tetap',
            ],
        ]);
    }
}
