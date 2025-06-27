<?php

namespace App\Filament\Resources\RiwayatKriteriaPenilaianResource\Pages;

use App\Filament\Resources\RiwayatKriteriaPenilaianResource;
use Filament\Resources\Pages\EditRecord;   // ⬅️ base class yang benar

class EditRiwayatKriteriaPenilaian extends EditRecord
{
    protected static string $resource = RiwayatKriteriaPenilaianResource::class;

    /* Jika mau kustom tombol header, validasi, dll.
       Tinggalkan kosong kalau cukup default. */
}
