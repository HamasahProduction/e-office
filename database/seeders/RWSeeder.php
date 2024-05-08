<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RWSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('rws')->insert([
            [
                'nomor' => '001',
            ],
            [
                'nomor' => '002',
            ],
            [
                'nomor' => '003',
            ],
            [
                'nomor' => '004',
            ],
            [
                'nomor' => '005',
            ],
            [
                'nomor' => '006',
            ],
            [
                'nomor' => '007',
            ],
            [
                'nomor' => '008',
            ],
            [
                'nomor' => '009',
            ],
        ]);
    }
}
