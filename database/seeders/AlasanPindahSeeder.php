<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlasanPindahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('alasan_pindah')->insert([
            [
                'keterangan' => 'Pekerjaan',
            ],
            [
                'keterangan' => 'Pendidikan',
            ],
            [
                'keterangan' => 'Keamanan',
            ],
            [
                'keterangan' => 'Kesehatan',
            ],
            [
                'keterangan' => 'Perumahan',
            ],
            [
                'keterangan' => 'Keluarga',
            ],
            [
                'keterangan' => 'Lainya',
            ],
        ]);
    }
}
