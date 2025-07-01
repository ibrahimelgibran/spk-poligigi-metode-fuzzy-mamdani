<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplierResource\Pages;
use App\Filament\Resources\SupplierResource\RelationManagers;
use App\Models\Supplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form->schema([
        TextInput::make('name')->label('Nama Supplier')->required(),

        Repeater::make('equipments')
            ->relationship()
            ->schema([
                TextInput::make('name')->label('Alat Kesehatan')->required(),
                TextInput::make('price')->label('Harga')->prefix('Rp')->numeric(),
                TextInput::make('brand')->label('Merek'),
                TextInput::make('warranty')->label('Garansi'),
            ])
    ]);
}

public static function table(Table $table): Table
{
    return $table->columns([
        // kolom nama supplier – sekarang bisa dicari
        TextColumn::make('name')
            ->label('Supplier')
            ->searchable(),          // ⬅️ tambahkan ini

        // kolom-kolom lain
        TextColumn::make('equipments.name')->label('Alat Kesehatan'),
        TextColumn::make('equipments.price')->label('Harga')->money('IDR'),
        TextColumn::make('equipments.brand')->label('Merek'),
        TextColumn::make('equipments.warranty')->label('Garansi'),
    ]);
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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }
}
