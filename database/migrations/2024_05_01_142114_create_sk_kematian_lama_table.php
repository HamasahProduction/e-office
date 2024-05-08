<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sk_kematian_lama', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik',16)->index();
            $table->string('nama');
            $table->string('umur')->nullable();
            $table->string('hari_meninggal')->nullable();
            $table->date('tgl_meninggal')->nullable();
            $table->string('lokasi_meninggal')->nullable();
            $table->string('penyebab_meninggal')->nullable();

            $table->string('nomor_surat');
            $table->string('no_urut_surat', 3)->unique()->nullable();
            $table->date('tgl_surat');
            $table->boolean('is_cetak')->index();

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('nik')->references('nik')->on('penduduks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sk_kematian_lama');
    }
};
