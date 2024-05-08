<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DetailAnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('detail_anggota_keluargas')->insert([
            [
                'nik'               => '3329021107540002',
                'id_kepala_keluarga'=> '1',
                'id_sdhk'           => '1',
                'nama_ayah'         => 'Jamaludin',
                'nama_ibu'          => 'ami',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ]);
    }
}
