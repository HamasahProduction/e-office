<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusKKTidakPindahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('status_nokk_yg_tdk_pindah')->insert([
            [
                'keterangan' => 'Numpang KK',
            ],
            [
                'keterangan' => 'Membuat KK Baru',
            ],
            [
                'keterangan' => 'Tidak Ada Anggota Keluarga Yang di Tinggal',
            ],
            [
                'keterangan' => 'Nomor KK Tetap',
            ],
        ]);
    }
}
