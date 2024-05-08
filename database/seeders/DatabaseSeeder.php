<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            DusunSeeder::class,
            RWSeeder::class,
            RTSeeder::class,
            DesaSeeder::class,
            IndoRegionProvinceSeeder::class,
            IndoRegionRegencySeeder::class,
            IndoRegionDistrictSeeder::class,
            IndoRegionVillageSeeder::class,
            JenisKepindahanSeeder::class,
            KlasifikasiPindahSeeder::class,
            StatusKKTidakPindahSeeder::class,
            StatusKKYangPindahSeeder::class,
            AlasanPindahSeeder::class,
            
            SDHKSeeder::class,
            PekerjaanSeeder::class,
            StatusPerkawinanSeeder::class,
            PendidikanSeeder::class,
            DataPerangkatPemerintah::class,
            PendudukSeeder::class,
            KepalaKeluargaSeeder::class,
            DetailAnggotaSeeder::class,
            DaftarSuratSeeder::class,

            LembagaSeeder::class,
            JabatanPengurusSeeder::class,
            // PengurusLembagaSeeder::class,

            // penulis
            KategoriArtikelSeeder::class,


        ]);
    }
}
