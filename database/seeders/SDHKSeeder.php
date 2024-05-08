<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SDHKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('sdhk')->insert([
            [
                'kd_sdhk' => '1',
                'keterangan' => 'Kepala Keluarga',
            ],
            [
                'kd_sdhk' => '3',
                'keterangan' => 'Istri',
            ],
            [
                'kd_sdhk' => '4',
                'keterangan' => 'Anak',
            ],
            [
                'kd_sdhk' => '5',
                'keterangan' => 'Menantu',
            ],
            [
                'kd_sdhk' => '6',
                'keterangan' => 'Cucu',
            ],
            [
                'kd_sdhk' => '7',
                'keterangan' => 'Orangtua',
            ],
            [
                'kd_sdhk' => '8',
                'keterangan' => 'Mertua',
            ],
            [
                'kd_sdhk' => '9',
                'keterangan' => 'Family Lainya',
            ],
            [
                'kd_sdhk' => '11',
                'keterangan' => 'Lainnya',
            ],
        ]);
    }
}
