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
      Schema::create('riwayat_kriteria_penilaians', function (Blueprint $table) {
    $table->id();
    $table->string('nama_alat_dan_bahan');
    $table->timestamp('tanggal_perhitungan');
    // kalau mau simpan sekalian hasil:
    $table->tinyInteger('nilai_akhir')->nullable();
    $table->string('keterangan')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_kriteria_penilaians');
    }
};
