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
        Schema::create('penduduk_pindah_datang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik_pemohon', 16)->index();
            $table->string('no_kk');
            $table->string('nama_pemohon');
            $table->string('nama_kepala_keluarga');
            $table->string('dusun_asal');
            $table->string('rt_asal');
            $table->string('rw_asal');
            $table->string('desa_asal');
            $table->string('kecamatan_asal');
            $table->string('kabupaten_asal');
            $table->string('provinsi_asal');
            $table->string('kode_pos_asal')->nullable();
            $table->string('no_hp')->nullable();
            $table->unsignedInteger('alasan_pindah_id')->index();
            $table->string('dusun_tujuan');
            $table->string('rt_tujuan');
            $table->string('rw_tujuan');
            $table->string('desa_tujuan');
            $table->string('kecamatan_tujuan');
            $table->string('kabupaten_tujuan');
            $table->string('provinsi_tujuan');
            $table->string('kode_pos_tujuan')->nullable();
            $table->unsignedInteger('klasifikasi_pindah_id')->index();
            $table->unsignedInteger('jenis_kepindahan_id')->index();
            $table->unsignedInteger('status_kk_tdk_pindah_id')->index();
            $table->unsignedInteger('status_kk_pindah_id')->index();
            $table->date('rencana_tgl_pindah');
            
            $table->string('status_surat')->index();
            $table->string('diketahui_oleh')->nullable();
            $table->string('no_surat')->nullable();
            $table->date('tgl_terbit_surat')->nullable();
            $table->boolean('is_sync_status_penduduk')->index();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('alasan_pindah_id')->references('id')->on('alasan_pindah')->onDelete('cascade');
            $table->foreign('klasifikasi_pindah_id')->references('id')->on('klasifikasi_pindah')->onDelete('cascade');
            $table->foreign('jenis_kepindahan_id')->references('id')->on('jenis_kepindahan')->onDelete('cascade');
            $table->foreign('status_kk_tdk_pindah_id')->references('id')->on('status_nokk_yg_tdk_pindah')->onDelete('cascade');
            $table->foreign('status_kk_pindah_id')->references('id')->on('status_nokk_bg_yg_pindah')->onDelete('cascade');
            $table->foreign('provinsi_asal')
                ->references('id')
                ->on('provinces')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('kabupaten_asal')
                ->references('id')
                ->on('regencies')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('kecamatan_asal')
                ->references('id')
                ->on('districts')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('desa_asal')
                ->references('id')
                ->on('villages')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('provinsi_tujuan')
                ->references('id')
                ->on('provinces')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('kabupaten_tujuan')
                ->references('id')
                ->on('regencies')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('kecamatan_tujuan')
                ->references('id')
                ->on('districts')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('desa_tujuan')
                ->references('id')
                ->on('villages')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk_pindah_datang');
    }
};
