<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('kategori_artikel')->insert([
            [
                'nama' => 'Semua',
                'slug' => 'semua',
            ],
            [
                'nama' => 'Politik',
                'slug' => 'politik',
            ],
            [
                'nama' => 'Kesehatan',
                'slug' => 'kesehatan',
            ],
            [
                'nama' => 'Pengumuman',
                'slug' => 'pengumuman',
            ],
            [
                'nama' => 'Olahraga',
                'slug' => 'olahraga',
            ],
            [
                'nama' => 'Kegiatan Desa',
                'slug' => 'kegiatan_Desa',
            ],
            [
                'nama' => 'Idul Fitri',
                'slug' => 'idul_fitri',
            ],
        ]);
    }
}
