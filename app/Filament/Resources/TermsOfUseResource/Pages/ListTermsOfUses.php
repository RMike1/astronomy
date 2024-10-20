<?php

namespace App\Filament\Resources\TermsOfUseResource\Pages;

use App\Filament\Resources\TermsOfUseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTermsOfUses extends ListRecords
{
    protected static string $resource = TermsOfUseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
