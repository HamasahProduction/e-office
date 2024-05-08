<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KlasifikasiPindahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('klasifikasi_pindah')->insert([
            [
                'keterangan' => 'Dalam Satu Desa/Kelurahan',
            ],
            [
                'keterangan' => 'Antar Desa/Kelurahan',
            ],
            [
                'keterangan' => 'Antar Kecamatan',
            ],
            [
                'keterangan' => 'Antar Kab/Kota',
            ],
            [
                'keterangan' => 'Antar Provinsi',
            ],
        ]);
    }
}
