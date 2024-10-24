<?php

namespace App\Filament\Resources\HomePageSectionResource\Pages;

use App\Filament\Resources\HomePageSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomePageSections extends ListRecords
{
    protected static string $resource = HomePageSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
