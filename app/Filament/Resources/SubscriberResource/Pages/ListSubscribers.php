<?php

namespace App\Filament\Resources\SubscriberResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\SubscriberResource;
use App\Filament\Resources\SubscriberResource\Widgets\SubscribeStatsWidget;

class ListSubscribers extends ListRecords
{
    protected static string $resource = SubscriberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            SubscribeStatsWidget::class
        ];
    }
}
