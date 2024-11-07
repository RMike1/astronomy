<?php

namespace App\Filament\Resources\HomePageSectionResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\HomePageSectionResource;
use App\Filament\Resources\HomePageSectionResource\Widgets\HomePageSectionStatsWidget;

class ListHomePageSections extends ListRecords
{
    protected static string $resource = HomePageSectionResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            HomePageSectionStatsWidget::class
        ];
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
  
}
