<?php

namespace App\Filament\Resources\KriteriaPenilaianResource\Pages;

use App\Filament\Resources\KriteriaPenilaianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKriteriaPenilaian extends EditRecord
{
    protected static string $resource = KriteriaPenilaianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
