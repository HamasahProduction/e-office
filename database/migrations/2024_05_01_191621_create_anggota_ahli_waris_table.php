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
        Schema::create('anggota_ahli_waris', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_ahli_waris')->index()->nullable();
            $table->string('nik')->nullable();
            $table->string('nama')->nullable();
            $table->string('ttl')->nullable();
            $table->string('alamat')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_ahli_waris')->references('id')->on('sk_ahli_waris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_ahli_waris');
    }
};
