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
        Schema::create('sk_kelahiran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_surat');
            $table->string('no_urut_surat', 3)->unique()->nullable();
            $table->string('nik',16)->index();
            $table->string('nik_ayah',16)->index()->nullable();
            $table->string('nik_ibu',16)->index()->nullable();
            $table->string('nik_kk',16)->index()->nullable();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('agama');
            $table->text('alamat');
            $table->date('tgl_surat');
            $table->boolean('is_cetak')->index();
            $table->string('note_response')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('nik')->references('nik')->on('penduduks')->onDelete('cascade');
            $table->foreign('nik_ayah')->references('nik')->on('penduduks')->onDelete('cascade');
            $table->foreign('nik_ibu')->references('nik')->on('penduduks')->onDelete('cascade');
            $table->foreign('nik_kk')->references('nik')->on('penduduks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sk_kelahiran');
    }
};
