<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('pendidikan')->insert([
            [
                'kd_pendidikan' => '1',
                'keterangan' => 'Tidak/Belum Sekolah',
            ],
            [
                'kd_pendidikan' => '2',
                'keterangan' => 'Tidak Tamat SD/Sederajat',
            ],
            [
                'kd_pendidikan' => '3',
                'keterangan' => 'Tamat SD/Sederajat',
            ],
            [
                'kd_pendidikan' => '4',
                'keterangan' => 'SLTP/Sederajat',
            ],
            [
                'kd_pendidikan' => '5',
                'keterangan' => 'SLTA/Sederajat',
            ],
            [
                'kd_pendidikan' => '6',
                'keterangan' => 'Diploma I/II',
            ],
            [
                'kd_pendidikan' => '7',
                'keterangan' => 'Diploma III/S. Muda',
            ],
            [
                'kd_pendidikan' => '8',
                'keterangan' => 'Diploma IV/Strata I',
            ],
            [
                'kd_pendidikan' => '9',
                'keterangan' => 'Strata II',
            ],
        ]);
    }
}
