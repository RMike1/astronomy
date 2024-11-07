<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Form;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\ToggleButtons;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends \Filament\Pages\Dashboard
{
    use HasFiltersForm;


    public function filtersForm(Form $form): Form{

        return $form->schema([
            Section::make()->schema([
                // DatePicker::make('startDate'),
                TimePicker::make('hey'),
                ColorPicker::make('endDate'),
                TextInput::make('name'),
                DateTimePicker::make('test')
                ->format('d/m/Y')
                ->reactive()
            ])->columns(3),
        ]);

    }
}