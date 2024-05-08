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
        Schema::create('pengurus_lembaga', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik')->index();
            $table->unsignedInteger('lembaga_id')->index();
            $table->unsignedInteger('jabatan_id')->index();
            $table->boolean('is_active')->default(0);
            $table->date('tgl_pengangkatan')->nullable();
            $table->date('tgl_pemberhentian')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('nik')->references('nik')->on('penduduks')->onDelete('cascade');
            $table->foreign('lembaga_id')->references('id')->on('lembaga')->onDelete('cascade');
            $table->foreign('jabatan_id')->references('id')->on('jabatan_pengurus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus_lembaga');
    }
};
