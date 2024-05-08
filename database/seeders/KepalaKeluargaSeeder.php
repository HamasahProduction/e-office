<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class KepalaKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('kepala_keluargas')->insert([
            [
                'nik'               => '3329021107540002',
                'no_kk'             => '3329021107540002',
                'jumlah_anggota'    => 0,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            
        ]);
    }
}
