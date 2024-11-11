<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Subscriber;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class SubscribeChartWidget extends ChartWidget
{
    use InteractsWithPageFilters, HasWidgetShield;
    protected static ?string $heading = 'Subscribers';

    protected function getData(): array
    {

        $startDate=$this->filters['startDate'];
        $endDate=$this->filters['endDate'];

        $data = Trend::model(Subscriber::class)
            ->between(
            start: $startDate ? Carbon::parse($startDate) : now()->subMonths(6),
            end: $endDate ? Carbon::parse($endDate) : now(),
            )
            ->perMonth()
            ->count();


        return [
            'datasets'=>[
                [
                    'label'=>'number of subscribers',
                    'data'=>$data->map(fn(TrendValue $value)=>$value->aggregate),
                ],
            ],
            'labels'=>$data->map(fn(TrendValue $value)=>$value->date),

        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
