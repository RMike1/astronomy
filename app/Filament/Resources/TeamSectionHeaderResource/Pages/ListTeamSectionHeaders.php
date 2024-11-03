<?php

namespace App\Filament\Resources\TeamSectionHeaderResource\Pages;

use App\Filament\Resources\TeamSectionHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeamSectionHeaders extends ListRecords
{
    protected static string $resource = TeamSectionHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
