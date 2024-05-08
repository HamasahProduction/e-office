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
        Schema::create('rts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->unsignedInteger('rw_id')->index();
            $table->string('rw')->nullable();
            $table->unsignedInteger('dusun_id')->index();
            $table->string('dusun')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('rw_id')->references('id')->on('rws')->onDelete('cascade');
            $table->foreign('dusun_id')->references('id')->on('dusuns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rts');
    }
};
