<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KriteriaPenilaian extends Model
{
    // **Tambahkan ini supaya Laravel tahu tabel yang dipakai**
    protected $table = 'kriteria_penilaian';

    protected $fillable = [
        'nama_alat_kesehatan_dan_bahan',
        'supplier',
        'nilai_akhir',
        'keterangan',
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'nama_alat_kesehatan_dan_bahan', 'nama_alat_dan_bahan');
    }
}
