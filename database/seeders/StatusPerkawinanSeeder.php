<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusPerkawinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('status_perkawinan')->insert([
            [
                'kd_status' => '1',
                'keterangan' => 'Belum Kawin',
            ],
            [
                'kd_status' => '2',
                'keterangan' => 'Kawin',
            ],
            [
                'kd_status' => '3',
                'keterangan' => 'Cerai Hidup',
            ],
            [
                'kd_status' => '4',
                'keterangan' => 'Cerai Mati',
            ],
        ]);
    }
}
