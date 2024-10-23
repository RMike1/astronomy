<?php

namespace App\Filament\Resources\CompanySocialMediaResource\Pages;

use App\Filament\Resources\CompanySocialMediaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanySocialMedia extends ListRecords
{
    protected static string $resource = CompanySocialMediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
