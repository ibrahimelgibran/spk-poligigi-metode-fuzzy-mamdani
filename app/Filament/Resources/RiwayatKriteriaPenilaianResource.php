<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RiwayatKriteriaPenilaianResource\Pages;
use App\Models\RiwayatKriteriaPenilaian;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions;

class RiwayatKriteriaPenilaianResource extends Resource
{
    protected static ?string $model           = RiwayatKriteriaPenilaian::class;
    protected static ?string $navigationIcon  = 'heroicon-o-clock';
    protected static ?string $navigationLabel = 'Riwayat Perhitungan';
    protected static ?int    $navigationSort  = 60;

    /* ────────────  Hanya matikan CREATE  ──────────── */
    public static function canCreate(): bool
    {
        return false;          // tombol “New” hilang
    }
    /* Edit & delete tetap di-izinkan → cukup pakai default (true) */

    /* form tidak dipakai */
    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    /* tabel riwayat */
    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('tanggal_perhitungan', 'desc')
            ->columns([
                TextColumn::make('nama_alat_dan_bahan')
                    ->label('Nama Alat & Bahan')
                    ->searchable(),

                TextColumn::make('tanggal_perhitungan')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

                TextColumn::make('nilai_akhir')
                    ->label('Nilai')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('keterangan')
                    ->wrap(),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\DeleteBulkAction::make(),
            ])
            ->headerActions([]);   // tetap tanpa tombol Create
    }

    public static function getRelations(): array
    {
        return [];
    }

    /* page Index + Edit saja */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRiwayatKriteriaPenilaians::route('/'),
            'edit'  => Pages\EditRiwayatKriteriaPenilaian::route('/{record}/edit'),
        ];
    }
}
