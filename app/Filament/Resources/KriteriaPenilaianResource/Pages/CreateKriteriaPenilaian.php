<?php

namespace App\Filament\Resources\KriteriaPenilaianResource\Pages;
use App\Models\RiwayatKriteriaPenilaian;

use App\Filament\Resources\KriteriaPenilaianResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Aset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form; // Ini yang kurang - import class Form
use Carbon\Carbon;  

class CreateKriteriaPenilaian extends CreateRecord
{
    protected static string $resource = KriteriaPenilaianResource::class;

    public function form(Form $form): Form
    {
        return $form->schema([
            Select::make('nama_alat_kesehatan_dan_bahan')
                ->label('Nama Alat dan Bahan')
                ->options(Aset::all()->pluck('nama_alat_dan_bahan', 'nama_alat_dan_bahan'))
                ->searchable()
                ->reactive() // ini penting!
                ->afterStateUpdated(function ($state, callable $set) {
                    $aset = Aset::where('nama_alat_dan_bahan', $state)->first();

                    if ($aset) {
                        // Hitung nilai akhir berdasarkan tingkat_kebutuhan
                        $nilai = match ((int) $aset->tingkat_kebutuhan) {
                            3 => 100,
                            2 => 75,
                            1 => 25,
                            default => 0,
                        };

                        // Set nilai akhir dan keterangan
                        $set('nilai_akhir', $nilai);
                        $set('keterangan', match ($nilai) {
                            100 => 'Sangat Direkomendasi',
                            75 => 'Direkomendasi',
                            25 => 'Tidak Direkomendasi',
                            default => 'Tidak Diketahui',
                        });
                    }
                })
                ->required(),

           TextInput::make('nilai_akhir')
    ->label('Nilai Akhir')
    ->numeric()
    ->required()
    ->readOnly()
      ->dehydrated(true),

            Textarea::make('keterangan')
                ->label('Keterangan')
                ->dehydrated(true),
        ]);
    }

     protected function afterCreate(): void
    {
        RiwayatKriteriaPenilaian::create([
            'nama_alat_dan_bahan' => $this->record->nama_alat_kesehatan_dan_bahan,
            'tanggal_perhitungan' => Carbon::now(),
            'nilai_akhir'         => $this->record->nilai_akhir,
            'keterangan'          => $this->record->keterangan,
        ]);
    }
}