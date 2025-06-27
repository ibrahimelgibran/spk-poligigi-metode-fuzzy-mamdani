<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KriteriaPenilaianResource\Pages;
use App\Models\KriteriaPenilaian;
use App\Models\Aset;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\Action;

class KriteriaPenilaianResource extends Resource
{
    protected static ?string $model = KriteriaPenilaian::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    /* ---------- Form ---------- */
    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('nama_alat_kesehatan_dan_bahan')
                ->label('Nama Alat dan Bahan')
                ->options(Aset::pluck('nama_alat_dan_bahan', 'nama_alat_dan_bahan')->toArray())
                ->searchable()
                ->required(),

            TextInput::make('nilai_akhir')
                ->label('Nilai Akhir')
                ->numeric()
                ->required()
                ->readOnly()
                ->dehydrated(true),

            TextInput::make('keterangan')
                ->label('Keterangan')
                ->dehydrated(true),
        ]);
    }

    /* ---------- Tabel ---------- */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_alat_kesehatan_dan_bahan')
                    ->label('Nama Alat dan Bahan')
                    ->sortable(),

                TextColumn::make('aset.supplier')
                    ->label('Supplier')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('nilai_akhir')
                    ->label('Nilai Akhir')
                    ->sortable(),

                TextColumn::make('keterangan')
                    ->label('Keterangan'),
            ])
            ->filters([
                SelectFilter::make('nilai_akhir')
                    ->label('Filter Nilai Akhir')
                    ->options([
                        100 => 'Sangat Direkomendasi',
                        75  => 'Direkomendasi',
                        25  => 'Tidak Direkomendasi',
                    ]),
            ])
            ->headerActions([
                Action::make('downloadPdf')
                    ->label('Download PDF')
                    ->url(fn () => route('kriteria.penilaian.pdf'))
                    ->openUrlInNewTab(),
            ])
            ->defaultSort('nilai_akhir', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    /* ---------- Halaman ---------- */
    public static function getPages(): array
    {
        return [
            'index'   => Pages\ListKriteriaPenilaians::route('/'),
            'create'  => Pages\CreateKriteriaPenilaian::route('/create'),
            'edit'    => Pages\EditKriteriaPenilaian::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string          { return 'Kriteria Penilaian'; }
    public static function getPluralModelLabel(): string    { return 'Kriteria Penilaian'; }
}
