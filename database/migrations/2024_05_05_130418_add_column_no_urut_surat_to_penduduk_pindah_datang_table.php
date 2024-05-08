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
        Schema::table('penduduk_pindah_datang', function (Blueprint $table) {
            $table->string('no_urut_surat', 3)->unique()->nullable()->after('no_surat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penduduk_pindah_datang', function (Blueprint $table) {
            $table->dropColumn('no_urut_surat');
        });
    }
};
