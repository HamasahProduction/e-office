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
        Schema::create('sk_ahli_waris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_surat');
            $table->string('no_urut_surat', 3)->unique()->nullable();
            $table->string('nama_pewaris');
            $table->string('alamat_pewaris')->nullable();
            $table->string('ketua_rt')->nullable();
            $table->string('ketua_rw')->nullable();
            $table->date('tgl_surat');
            $table->boolean('is_cetak')->index();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sk_ahli_waris');
    }
};
