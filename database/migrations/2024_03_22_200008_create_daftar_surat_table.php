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
        Schema::create('daftar_surat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_surat')->index();
            $table->string('jenis_surat')->index();
            $table->string('kode_surat')->nullable();
            $table->string('no_urut_surat')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('url')->nullable();
            $table->boolean('is_active')->index();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_surat');
    }
};
