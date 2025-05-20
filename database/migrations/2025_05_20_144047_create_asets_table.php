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
    Schema::create('asets', function (Blueprint $table) {
        $table->id();
        $table->string('nama_alat_dan_bahan');
        $table->decimal('harga', 15, 2);
        $table->string('merek')->nullable();
        $table->string('garansi')->nullable();
        $table->string('tingkat_kebutuhan')->nullable();
        $table->string('jenis'); // alat atau bahan
        $table->date('tanggal_input');
        $table->string('satuan')->nullable();
        $table->date('kadaluarsa')->nullable(); // wajib diisi kalau bahan
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asets');
    }
};
