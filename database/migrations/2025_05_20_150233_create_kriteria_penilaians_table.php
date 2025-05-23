<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('kriteria_penilaian', function (Blueprint $table) {
        $table->id();
        $table->string('nama_alat_kesehatan_dan_bahan');
        $table->integer('nilai_akhir');
        $table->string('keterangan');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriteria_penilaian');
    }
};
