<?php

namespace App\Filament\Resources\SubscriberResource\Pages;

use App\Filament\Resources\SubscriberResource;
use App\Filament\Widgets\SubscribeWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

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
            SubscribeWidget::class
        ];
    }
}
