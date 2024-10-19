<?php

namespace App\Filament\Resources\ContactSectionHeaderResource\Pages;

use App\Filament\Resources\ContactSectionHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactSectionHeader extends EditRecord
{
    protected static string $resource = ContactSectionHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
