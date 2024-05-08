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
        Schema::create('lampiran_sm', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_surat')->index()->nullable();
            $table->string('perihal');
            $table->string('file');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_surat')->references('id')->on('surat_masuk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lampiran_sm');
    }
};
