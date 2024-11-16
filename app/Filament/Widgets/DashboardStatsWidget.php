<?php

namespace App\Filament\Widgets;

use App\Models\HomePageSection;
use App\Models\Subscriber;
use App\Models\Team;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class DashboardStatsWidget extends BaseWidget
{

    use HasWidgetShield;

    use InteractsWithPageFilters;
    protected function getStats(): array
    {

        $startDate=$this->filters['startDate'];
        $endDate=$this->filters['endDate'];

        return [
            Stat::make('Home Page Contents', HomePageSection::when($startDate, fn($query)
            =>$query->whereDate('created_at','>',$startDate))
            ->when($endDate, fn($query)=>$query->whereDate('created_at','<',$endDate))
            ->count())
            ->description('total number of contents')
            ->descriptionIcon('heroicon-m-home-modern',IconPosition::Before)
            ->chart([0,0,0,0,0])
            ->color('warning'),
            Stat::make('Subscribers', Subscriber::when($startDate, fn($query)
            =>$query->whereDate('created_at','>',$startDate))
            ->when($endDate, fn($query)=>$query->whereDate('created_at','<',$endDate))
            ->count())
            ->description('total number of subscribers')
            ->descriptionIcon('heroicon-o-queue-list',IconPosition::Before)
            ->chart([0,0,0,0,0])
            ->color('warning'),
            Stat::make('Team Members', Team::when($startDate, fn($query)
            =>$query->whereDate('created_at','>',$startDate))
            ->when($endDate, fn($query)=>$query->whereDate('created_at','<',$endDate))
            ->count())
            ->description('total number of team members')
            ->descriptionIcon('heroicon-m-user-group',IconPosition::Before)
            ->chart([0,0,0,0,0])
            ->color('success')
        ];
    }
}
