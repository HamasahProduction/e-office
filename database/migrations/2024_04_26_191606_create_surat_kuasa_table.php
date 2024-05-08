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
        Schema::create('surat_kuasa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_ahli_waris');
            $table->string('nik_anggota_ahli_waris')->index();
            $table->string('nik_penerima_kuasa')->index();
            $table->string('keterangan');
            $table->date('tgl_surat');
            $table->boolean('is_cetak')->index();
            $table->string('note')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('nik_anggota_ahli_waris')->references('nik')->on('penduduks')->onDelete('cascade');
            $table->foreign('nik_penerima_kuasa')->references('nik')->on('penduduks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_kuasa');
    }
};
