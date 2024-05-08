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
        Schema::create('sk_kematian_baru', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik',16)->index();
            $table->string('nama');
            $table->string('jk')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('umur')->nullable();
            $table->string('agama')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('keturunan')->nullable();
            $table->string('kebangsaan')->nullable();
            $table->string('anak_ke')->nullable();
            $table->date('tgl_kematian')->nullable();
            $table->string('waktu_kematian')->nullable();
            $table->string('sebab_kematian')->nullable();
            $table->string('yang_menerengkan')->nullable();

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
        Schema::dropIfExists('sk_kematian_baru');
    }
};
