<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BobotResource\Pages;
use App\Filament\Resources\BobotResource\RelationManagers;
use App\Models\Bobot;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class BobotResource extends Resource
{
    protected static ?string $model = Bobot::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form->schema([
        Select::make('supplier_id')
            ->label('Supplier')
            ->relationship('supplier', 'name')
            ->searchable()
            ->required(),

        Select::make('harga')
            ->label('Harga')
            ->options([
                1 => 'Cepat (< 1 tahun)',
                2 => 'Sedang (1-2 tahun)',
                3 => 'Tinggi (> 2 tahun)',
            ])
            ->required(),

        Select::make('merek')
            ->label('Merek')
            ->options([
                1 => 'Kurang dikenal',
                2 => 'Cukup dikenal',
                3 => 'Terkemuka',
            ])
            ->required(),

        Select::make('garansi')
            ->label('Garansi')
            ->options([
                1 => 'Rendah (≤ 6 bulan)',
                2 => 'Sedang (7–12 bulan)',
                3 => 'Tinggi (≥ 1 tahun)',
            ])
            ->required(),

        Select::make('degradasi')
            ->label('Degradasi')
            ->options([
                1 => 'Cepat (< 1 tahun)',
                2 => 'Sedang (1-2 tahun)',
                3 => 'Tinggi (> 2 tahun)',
            ])
            ->required(),
    ]);
}

    public static function table(Table $table): Table
{
    return $table->columns([
        TextColumn::make('supplier.name')->label('Supplier'),
        TextColumn::make('harga')->label('Harga'),
        TextColumn::make('merek')->label('Merek'),
        TextColumn::make('garansi')->label('Garansi'),
        TextColumn::make('degradasi')->label('Degradasi'),
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
            'index' => Pages\ListBobots::route('/'),
            'create' => Pages\CreateBobot::route('/create'),
            'edit' => Pages\EditBobot::route('/{record}/edit'),
        ];
    }
}
