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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->string('nik',16)->primary();
            $table->string('no_kk');
            $table->string('nama_lengkap');
            $table->date('tgl_lahir');
            $table->string('tempat_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kewarganegaraan');
            
            $table->unsignedInteger('user_id')->index()->nullable();
            $table->unsignedInteger('id_pendidikan')->index()->nullable();
            $table->unsignedInteger('id_pekerjaan')->index()->nullable();
            $table->unsignedInteger('id_sdhk')->index()->nullable();
            $table->unsignedInteger('id_status_perkawinan')->index()->nullable();
            $table->unsignedInteger('rt_id')->index()->nullable();
            $table->char('province_id',2);
            $table->char('regency_id', 4);
            $table->char('district_id',7);
            $table->char('village_id', 10);
            $table->string('status_penduduk')->nullable();
            $table->boolean('is_live')->index();
            $table->boolean('is_mutasi')->index();
            $table->boolean('is_kepala_keluarga')->index();
            $table->boolean('is_keluarga')->index();
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_pendidikan')->references('id')->on('pendidikan')->onDelete('cascade');
            $table->foreign('id_pekerjaan')->references('id')->on('pekerjaan')->onDelete('cascade');
            $table->foreign('id_sdhk')->references('id')->on('sdhk')->onDelete('cascade');
            $table->foreign('id_status_perkawinan')->references('id')->on('status_perkawinan')->onDelete('cascade');
            $table->foreign('rt_id')->references('id')->on('rts')->onDelete('cascade');
            
            $table->foreign('province_id')
                ->references('id')
                ->on('provinces')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('regency_id')
                ->references('id')
                ->on('regencies')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('district_id')
                ->references('id')
                ->on('districts')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('village_id')
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
        Schema::dropIfExists('penduduks');
    }
};
