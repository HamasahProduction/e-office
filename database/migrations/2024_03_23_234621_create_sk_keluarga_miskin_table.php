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
        Schema::create('sk_keluarga_miskin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_surat');
            $table->string('no_urut_surat', 3)->unique()->nullable();
            $table->string('nik',16)->index();
            $table->string('nama_pemohon')->index();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir');
            $table->string('alamat')->nullable();
            $table->string('warganegara')->index()->nullable();

            $table->string('nik_keperluan')->index();
            $table->string('nama_keperluan')->index();
            $table->string('nama_orang_keperluan')->index();
            $table->string('jenis_kelamin_keperluan')->nullable();
            $table->string('tempat_lahir_keperluan')->nullable();
            $table->date('tgl_lahir_keperluan');
            
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
        Schema::dropIfExists('sk_keluarga_miskin');
    }
};
