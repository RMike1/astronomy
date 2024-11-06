<?php

namespace App\Filament\Resources\TeamResource\Pages;

use Filament\Actions;
use App\Filament\Widgets\TeamWidget;
use App\Filament\Resources\TeamResource;
use Filament\Resources\Pages\ListRecords;

class ListTeams extends ListRecords
{
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            TeamWidget::class
        ];
    }
}
