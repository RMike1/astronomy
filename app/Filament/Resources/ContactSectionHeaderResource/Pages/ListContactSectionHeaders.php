<?php

namespace App\Filament\Resources\ContactSectionHeaderResource\Pages;

use App\Filament\Resources\ContactSectionHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContactSectionHeaders extends ListRecords
{
    protected static string $resource = ContactSectionHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
