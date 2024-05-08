<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('pekerjaan')->insert([
            [
                'kd_pekerjaan' => '1',
                'keterangan' => 'Belum/Tidak Bekerja',
            ],
            [
                'kd_pekerjaan' => '2',
                'keterangan' => 'Mengurus Rumah Tangga',
            ],
            [
                'kd_pekerjaan' => '3',
                'keterangan' => 'Pelajar/Mahasiswa',
            ],
            [
                'kd_pekerjaan' => '4',
                'keterangan' => 'Pensiunan',
            ],
            [
                'kd_pekerjaan' => '5',
                'keterangan' => 'Pegawai Negeri Sipil',
            ],
            [
                'kd_pekerjaan' => '8',
                'keterangan' => 'Perdagangan',
            ],
            [
                'kd_pekerjaan' => '9',
                'keterangan' => 'Petani/Pekebun',
            ],
            [
                'kd_pekerjaan' => '13',
                'keterangan' => 'Konstruksi',
            ],
            [
                'kd_pekerjaan' => '15',
                'keterangan' => 'Karyawan Swasta',
            ],
            [
                'kd_pekerjaan' => '16',
                'keterangan' => 'Karyawan BUMN',
            ],
            [
                'kd_pekerjaan' => '17',
                'keterangan' => 'Karyawan BUMD',
            ],
            [
                'kd_pekerjaan' => '18',
                'keterangan' => 'Karyawan Honorer',
            ],
            [
                'kd_pekerjaan' => '19',
                'keterangan' => 'Buruh Harian Lepas',
            ],
            [
                'kd_pekerjaan' => '20',
                'keterangan' => 'Buruh Tani/Perkebunan',
            ],
            [
                'kd_pekerjaan' => '26',
                'keterangan' => 'Tukang Batu',
            ],
            [
                'kd_pekerjaan' => '27',
                'keterangan' => 'Tukang Kayu',
            ],
            [
                'kd_pekerjaan' => '29',
                'keterangan' => 'Tukang Las/Pandai Besi',
            ],
            [
                'kd_pekerjaan' => '30',
                'keterangan' => 'Tukang Jahit',
            ],
            [
                'kd_pekerjaan' => '32',
                'keterangan' => 'Penata Rias',
            ],
            [
                'kd_pekerjaan' => '35',
                'keterangan' => 'Mekanik',
            ],
            [
                'kd_pekerjaan' => '64',
                'keterangan' => 'Dosen',
            ],
            [
                'kd_pekerjaan' => '65',
                'keterangan' => 'Guru',
            ],
            [
                'kd_pekerjaan' => '74',
                'keterangan' => 'Perawat',
            ],
            [
                'kd_pekerjaan' => '81',
                'keterangan' => 'Sopir',
            ],
            [
                'kd_pekerjaan' => '84',
                'keterangan' => 'Pedagang',
            ],
            [
                'kd_pekerjaan' => '85',
                'keterangan' => 'Perangkat Desa',
            ],
            [
                'kd_pekerjaan' => '86',
                'keterangan' => 'Kepala Desa',
            ],
            [
                'kd_pekerjaan' => '88',
                'keterangan' => 'Wiraswasta',
            ],
        ]);
    }
}
