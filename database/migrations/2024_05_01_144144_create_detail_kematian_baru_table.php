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
        Schema::create('detail_kematian_baru', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kematian_baru_id')->index()->nullable();
            $table->string('nik_pelapor',16)->index()->nullable();
            $table->string('nik_saksi_1',16)->index()->nullable();
            $table->string('nik_saksi_2',16)->index()->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('umur_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('desa_ayah')->nullable();
            $table->string('kecamatan_ayah')->nullable();
            $table->string('kabupaten_ayah')->nullable();
            $table->string('provinsi_ayah')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('umur_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('desa_ibu')->nullable();
            $table->string('kecamatan_ibu')->nullable();
            $table->string('kabupaten_ibu')->nullable();
            $table->string('provinsi_ibu')->nullable();
          

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kematian_baru_id')->references('id')->on('sk_kematian_baru')->onDelete('cascade');
            $table->foreign('nik_pelapor')->references('nik')->on('penduduks')->onDelete('cascade');
            $table->foreign('nik_saksi_1')->references('nik')->on('penduduks')->onDelete('cascade');
            $table->foreign('nik_saksi_2')->references('nik')->on('penduduks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kematian_baru');
    }
};
