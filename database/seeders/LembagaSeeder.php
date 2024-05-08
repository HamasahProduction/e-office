<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LembagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('lembaga')->insert([
            [
                'nama_lembaga' => 'Badan Permusyawaratan Desa',
                'is_active' => true,
            ],
            [
                'nama_lembaga' => 'Lembaga Pemberdayaan Masyarakat',
                'is_active' => true,
            ],
            [
                'nama_lembaga' => 'Pembinaan Kesejahteraan Keluarga',
                'is_active' => true,
            ],
            [
                'nama_lembaga' => 'Karang Taruna Satya Dharma Manggala',
                'is_active' => true,
            ],
            [
                'nama_lembaga' => 'Linmas Desa',
                'is_active' => true,
            ],
            [
                'nama_lembaga' => 'Kelompok Informasi Masyarakat',
                'is_active' => false,
            ],
            [
                'nama_lembaga' => 'Kelompok Sadar Wisata',
                'is_active' => true,
            ],
            [
                'nama_lembaga' => 'Badan Usaha Milik Desa',
                'is_active' => true,
            ],
        ]);
            
    }
}
