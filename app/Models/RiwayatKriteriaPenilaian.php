<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatKriteriaPenilaian extends Model
{
    protected $fillable = [
        'nama_alat_dan_bahan',
        'tanggal_perhitungan',
        'nilai_akhir',
        'keterangan',
    ];
}

