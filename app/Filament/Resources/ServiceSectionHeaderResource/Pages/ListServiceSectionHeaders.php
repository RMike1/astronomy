<?php

namespace App\Filament\Resources\ServiceSectionHeaderResource\Pages;

use App\Filament\Resources\ServiceSectionHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceSectionHeaders extends ListRecords
{
    protected static string $resource = ServiceSectionHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
