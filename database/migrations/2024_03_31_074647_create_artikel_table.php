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
        Schema::create('artikel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('thumbnail')->nullable();
            $table->string('slug');
            $table->string('judul');
            $table->longText('konten');
            $table->string('user');
            $table->date('tgl_posting');
            $table->boolean('status_posting')->default(0);
            $table->unsignedInteger('kategori_id');
            $table->unsignedInteger('iklan_id')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('kategori_id')->references('id')->on('kategori_artikel')->onDelete('cascade');
            $table->foreign('iklan_id')->references('id')->on('iklan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};
