<?php

namespace App\Filament\Resources\ServiceSectionHeaderResource\Pages;

use App\Filament\Resources\ServiceSectionHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServiceSectionHeader extends EditRecord
{
    protected static string $resource = ServiceSectionHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
