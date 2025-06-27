<?php

namespace App\Filament\Resources\RiwayatKriteriaPenilaianResource\Pages;

use App\Filament\Resources\RiwayatKriteriaPenilaianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRiwayatKriteriaPenilaians extends ListRecords
{
    protected static string $resource = RiwayatKriteriaPenilaianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
