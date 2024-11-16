<?php

namespace App\Filament\Resources\HomePageSectionResource\Widgets;

use App\Models\HomePageSection;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HomePageSectionStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Home Page Contents', HomePageSection::count())
            ->description('total number of contents')
            ->descriptionIcon('heroicon-m-home-modern',IconPosition::Before)
            ->chart([0,0,0,0,0])
            ->color('warning'),
        ];
    }
}
