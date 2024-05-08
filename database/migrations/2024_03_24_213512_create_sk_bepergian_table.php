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
        Schema::create('sk_bepergian', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_surat');
            $table->string('no_urut_surat', 3)->unique()->nullable();
            $table->string('nik', 16)->index();
            $table->string('kepentingan');
            $table->char('province_id',2);
            $table->char('regency_id', 4);
            $table->char('district_id',7);
            $table->char('village_id', 10);
            $table->date('tgl_surat');
            $table->boolean('is_cetak')->index();
            $table->string('note_response')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
            $table->foreign('nik')->references('nik')->on('penduduks')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sk_bepergian');
    }
};
