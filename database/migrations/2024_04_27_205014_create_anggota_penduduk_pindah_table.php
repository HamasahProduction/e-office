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
        Schema::create('anggota_penduduk_pindah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik',16)->index();
            $table->string('nama');
            $table->string('kode_sdhk')->nullable();
            $table->unsignedInteger('id_kepindahan');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('nik')->references('nik')->on('penduduks')->onDelete('cascade');
            $table->foreign('id_kepindahan')->references('id')->on('penduduk_pindah_datang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_penduduk_pindah');
    }
};
