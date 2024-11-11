<?php

namespace App\Filament\Pages;

use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;

class Dashboard extends \Filament\Pages\Dashboard
{


    use HasFiltersForm;


    // protected function getShieldRedirectPath(): string
    // {
    //     return route('filament.admin.pages.dashboard'); 
    // }



    public function filtersForm(Form $form): Form
    {

        return $form->schema([
            Section::make()->schema([
                DatePicker::make('startDate')
                    ->native(false),
                DatePicker::make('endDate')
                    ->native(false),
            ])->columns(2),
        ]);
    }
}
