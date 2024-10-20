<?php

namespace App\Filament\Resources\TermsOfUseResource\Pages;

use App\Filament\Resources\TermsOfUseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTermsOfUse extends EditRecord
{
    protected static string $resource = TermsOfUseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
