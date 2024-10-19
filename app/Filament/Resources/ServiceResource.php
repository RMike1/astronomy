<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationGroup = 'Home Page';

    protected static ?string $navigationLabel = 'Service Section';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make()->schema([
                TextInput::make('title')
                ->label('Title')
                ->required(),
                TextInput::make('slug')
                ->label('Slug')
                ->required(),
                Textarea::make('summary_description')->label('Summary Description')->required()->columnSpan(2),
                RichEditor::make('full_description')->label('Full Description')->columnSpan(2)->required(),
                Toggle::make('is_active')
                ->label('Active'),
            ])->columns(2),
            
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('counter')
                ->label('No.')
                ->getStateUsing(function ($rowLoop, $record) {
                    // Return the current row index + 1
                    return $rowLoop->iteration;
                })
                ->sortable(false),
                TextColumn::make('title')->label('Title')->searchable()->sortable(),
                TextColumn::make('slug')->label('Slug')->limit(50)->searchable()->sortable(),
                ToggleColumn::make('is_active')->label('Active')->sortable(),
                TextColumn::make('summary_description')->limit(50)->label('Summary Description')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
