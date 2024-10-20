<?php

namespace App\Filament\Resources\HomePageSectionResource\Pages;

use App\Filament\Resources\HomePageSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomePageSection extends EditRecord
{
    protected static string $resource = HomePageSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
