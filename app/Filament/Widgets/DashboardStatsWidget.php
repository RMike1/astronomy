<?php

namespace App\Filament\Widgets;

use App\Models\HomePageSection;
use App\Models\Subscriber;
use App\Models\Team;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Home Page Contents', HomePageSection::count())
            ->description('total number of contents')
            ->descriptionIcon('heroicon-m-home-modern',IconPosition::Before)
            ->chart([5,5,7,6,8])
            ->color('warning'),
            Stat::make('Subscribers', Subscriber::count())
            ->description('total number of subscribers')
            ->descriptionIcon('heroicon-o-queue-list',IconPosition::Before)
            ->chart([1,4,2,8,6])
            ->color('warning'),
            Stat::make('Team Members', Team::count())
            ->description('total number of team members')
            ->descriptionIcon('heroicon-m-user-group',IconPosition::Before)
            ->chart([3,4,6,1,6])
            ->color('success')
        ];
    }
}
