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
        Schema::create('sk_beda_nama', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_surat');
            $table->string('no_urut_surat', 3)->unique()->nullable();
            $table->string('nik',16)->index();
            $table->string('dokumen_berbeda');
            $table->string('dokumen_berbeda_lainya');
            $table->string('perbedaan_nama');
            $table->string('perbedaan_nama_lainya');
            $table->string('jumlah_berkas');
            $table->date('tgl_surat');
            $table->boolean('is_cetak')->index();
            $table->string('note_response')->nullable();
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
        Schema::dropIfExists('sk_beda_nama');
    }
};
