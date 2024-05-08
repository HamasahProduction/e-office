<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DataPerangkatPemerintah extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('data_perangkat_pemerintah')->insert([
            [
                'id'=>1,
                'nip' => '3251757659200033',
                'nama' => 'RUSKANDA',
                'jabatan' => 'Kepala Desa Cimara',
                'is_active' =>true,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'id'=>2,
                'nip' => '19660504 199703 1 0003',
                'nama' => 'NANA KUSMANA, S.Sos, MM',
                'jabatan' => 'Camat Kecamatan Cibeureum',
                'is_active' =>true,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'id'=>3,
                'nip' => '3242757658130133',
                'nama' => 'DIDING HIDAYAT, S.pd',
                'jabatan' => 'Sekertaris Desa',
                'is_active' =>true,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ]);
    }
}
