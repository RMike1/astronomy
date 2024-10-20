<?php

namespace App\Filament\Resources\HeroSectionResource\Pages;

use App\Filament\Resources\HeroSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHeroSection extends ViewRecord
{
    protected static string $resource = HeroSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
