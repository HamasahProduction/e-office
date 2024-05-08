<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('desa')->insert([
            [
                'nama_desa' =>'DESA CIMARA',
                'deskripsi' =>'Desa Cimara secara administrasi merupakan salah satu desa dalam wilayah kecamatan Cibeureum Kabupaten Kuningan, dengan batas – batas wilayahnya yaitu sebelah utara berbatasan dengan Desa Kawungsari, sebelah selatan berbatasan dengan Desa Capar, sebelah barat berbatasan dengan Desa Karangkancana, sebelah timur berbatasan dengan Desa Sukarapih',
                'alamat'    =>"Alamat : Jalan Raya Cimara - Cibeureum No.01 Kode Pos 45588 ",
                'kontak'    =>"08xxxxxxxxxxx",
                'email'     =>"desacimara@gmail.com",
            ],
        ]);
    }
}

