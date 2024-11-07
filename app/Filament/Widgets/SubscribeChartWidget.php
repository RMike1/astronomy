<?php

namespace App\Filament\Widgets;

use App\Models\Subscriber;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class SubscribeChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Subscribers';
    // protected int | string | array $columnSpan = 1;


    protected function getData(): array
    {

        $data = Trend::model(Subscriber::class)
            ->between(
            start: now()->subMonths(6),
            end: now(),
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
