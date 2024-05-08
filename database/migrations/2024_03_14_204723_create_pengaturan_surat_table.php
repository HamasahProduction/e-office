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
        Schema::create('pengaturan_surat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul_surat');
            $table->string('kode_surat');
            $table->string('nomor_surat');
            $table->string('jabatan');
            $table->string('nama_ttd');
            $table->unsignedInteger('is_ttd')->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('is_ttd')->references('id')->on('data_perangkat_pemerintah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaturan_surat');
    }
};
