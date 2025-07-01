<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Aset;          // model alat kesehatan
use App\Models\KriteriaPenilaian;
use App\Models\Supplier;      // model supplier
use App\Models\Penilaian;     // model penilaian

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.dashboard';

    // properti publik agar bisa dipakai di Blade
    public int $totalAset     = 0;
    public int $totalSupplier = 0;
    public int $totalNilai    = 0;

    public function mount(): void
    {
        // hitung jumlah tiap tabel
        $this->totalAset     = Aset::count();
        $this->totalSupplier = Supplier::count();
        $this->totalNilai    = KriteriaPenilaian::count();
    }
}
