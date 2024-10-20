<?php

namespace App\Filament\Resources\TermsOfUseResource\Pages;

use App\Filament\Resources\TermsOfUseResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTermsOfUse extends ViewRecord
{
    protected static string $resource = TermsOfUseResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
