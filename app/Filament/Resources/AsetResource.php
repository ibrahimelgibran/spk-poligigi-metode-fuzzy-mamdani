<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AsetResource\Pages;
use App\Filament\Resources\AsetResource\RelationManagers;
use App\Models\Aset;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class AsetResource extends Resource
{
    protected static ?string $model = Aset::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'Manajemen Aset';
    protected static ?string $pluralLabel = 'Aset';
    protected static ?string $slug = 'aset';


   public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(2)->schema([
                TextInput::make('nama_alat_dan_bahan')->required()->label('Nama Alat/Bahan'),
                 TextInput::make('supplier')              // ⬅️ field baru
                    ->label('Supplier')
                    ->maxLength(255),
                TextInput::make('harga')->numeric()->required(),
                TextInput::make('merek'),
                TextInput::make('garansi'),
                TextInput::make('tingkat_kebutuhan'),
                Select::make('jenis')
                    ->required()
                    ->options([
                        'alat' => 'Alat',
                        'bahan' => 'Bahan',
                    ])
                    ->live(), // penting agar bisa observe kondisi
                DatePicker::make('tanggal_input')->required(),
                TextInput::make('satuan'),
                DatePicker::make('kadaluarsa')
                    ->label('Tanggal Kadaluarsa')
                    ->visible(fn ($get) => $get('jenis') === 'bahan')
                    ->required(fn ($get) => $get('jenis') === 'bahan'),
            ]),
        ]);
    }


    public static function table(Table $table): Table
{
    return $table->columns([
        TextColumn::make('nama_alat_dan_bahan')->label('Nama'),
        TextColumn::make('supplier')->label('Supplier')->sortable(),
        TextColumn::make('jenis')->label('Jenis'),
        TextColumn::make('harga')->money('IDR')->label('Harga'),
        TextColumn::make('merek')->label('Merek')->sortable(),
        TextColumn::make('garansi')->label('Garansi')->sortable(),
        TextColumn::make('tingkat_kebutuhan')->label('Tingkat Kebutuhan')->sortable(),
        TextColumn::make('satuan')->label('Satuan'),
        TextColumn::make('tanggal_input')->date()->label('Tanggal Input'),
        TextColumn::make('kadaluarsa')->date()->label('Kadaluarsa'),
    ])
    ->defaultSort('tanggal_input', 'desc');  // misal urut berdasarkan tanggal input terbaru
     // pakai paginasi 15 per halaman, bisa diganti atau dihilangkan
}

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAsets::route('/'),
            'create' => Pages\CreateAset::route('/create'),
            'edit' => Pages\EditAset::route('/{record}/edit'),
        ];
    }
}