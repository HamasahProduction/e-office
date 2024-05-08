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
        Schema::create('detail_anggota_keluargas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik',16)->index();
            $table->unsignedInteger('id_kepala_keluarga')->index();
            $table->unsignedInteger('id_sdhk')->index();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->boolean('is_mutasi')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('nik')->references('nik')->on('penduduks')->onDelete('cascade');
            $table->foreign('id_kepala_keluarga')->references('id')->on('kepala_keluargas')->onDelete('cascade');
            $table->foreign('id_sdhk')->references('id')->on('sdhk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_anggota_keluargas');
    }
};
