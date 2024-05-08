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
        Schema::create('permohonan_administrasi_warga', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_register');
            $table->string('nik',16)->index();
            $table->string('nama_pemohon');
            $table->string('jenis_surat');
            $table->date('tgl_permohonan');
            $table->string('url_slug');
            $table->string('status');
            $table->string('kontak');
            
            $table->text('keterangan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('kelas')->nullable();
            $table->string('nama_usaha')->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->string('nik_peruntukan',16)->index()->nullable();
            $table->string('nik_orangtua',16)->index()->nullable();
            $table->string('penghasilan')->nullable();

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
        Schema::dropIfExists('permohonan_administrasi_warga');
    }
};
