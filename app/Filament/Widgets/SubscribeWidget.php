<?php

namespace App\Filament\Widgets;

use App\Models\Subscriber;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SubscribeWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Subscribers', Subscriber::count())
            ->description('total number of subscribers')
            ->descriptionIcon('heroicon-o-queue-list',IconPosition::Before)
            ->chart([1,4,2,8,6])
            ->color('warning')
        ];
    }
}
