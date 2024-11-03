<?php

namespace App\Filament\Resources\TeamSectionHeaderResource\Pages;

use App\Filament\Resources\TeamSectionHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeamSectionHeader extends EditRecord
{
    protected static string $resource = TeamSectionHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
