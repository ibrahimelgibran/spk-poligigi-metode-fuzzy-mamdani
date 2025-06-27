<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $fillable = [
        'nama_alat_dan_bahan',
        'supplier',
        'harga',
        'merek',
        'garansi',
        'tingkat_kebutuhan',
        'jenis',
        'tanggal_input',
        'satuan',
        'kadaluarsa',
    ];

    protected $casts = [
        'tanggal_input' => 'date',
        'kadaluarsa' => 'date',
    ];

    public function kriteriaPenilaian()
{
    return $this->hasOne(KriteriaPenilaian::class, 'nama_alat_kesehatan_dan_bahan', 'nama_alat_dan_bahan');
}

}

