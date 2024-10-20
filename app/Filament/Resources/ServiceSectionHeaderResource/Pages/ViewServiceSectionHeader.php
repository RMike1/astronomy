<?php

namespace App\Filament\Resources\ServiceSectionHeaderResource\Pages;

use App\Filament\Resources\ServiceSectionHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewServiceSectionHeader extends ViewRecord
{
    protected static string $resource = ServiceSectionHeaderResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
