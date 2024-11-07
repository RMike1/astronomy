<?php

namespace App\Filament\Resources\TeamResource\Widgets;

use App\Models\Team;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TeamStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Team Members', Team::count())
            ->description('total number of team members')
            ->descriptionIcon('heroicon-m-user-group',IconPosition::Before)
            ->chart([3,4,6,1,6])
            ->color('success')
        ];
    }
}
