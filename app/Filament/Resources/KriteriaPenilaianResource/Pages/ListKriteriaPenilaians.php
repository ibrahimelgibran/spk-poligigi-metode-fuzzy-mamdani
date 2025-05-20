<?php

namespace App\Filament\Resources\KriteriaPenilaianResource\Pages;

use App\Filament\Resources\KriteriaPenilaianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKriteriaPenilaians extends ListRecords
{
    protected static string $resource = KriteriaPenilaianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
