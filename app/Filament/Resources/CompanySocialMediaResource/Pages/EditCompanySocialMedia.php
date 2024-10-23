<?php

namespace App\Filament\Resources\CompanySocialMediaResource\Pages;

use App\Filament\Resources\CompanySocialMediaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanySocialMedia extends EditRecord
{
    protected static string $resource = CompanySocialMediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
