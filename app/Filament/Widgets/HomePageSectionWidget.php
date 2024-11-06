<?php

namespace App\Filament\Widgets;

use App\Models\HomePageSection;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HomePageSectionWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Home Page Contents', HomePageSection::count())
            ->description('total number of contents')
            ->descriptionIcon('heroicon-m-home-modern',IconPosition::Before)
            ->chart([5,5,7,6,8])
            ->color('info'),
        ];
    }
}
