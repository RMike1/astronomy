<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\CompanySocialMedia;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\CheckboxList;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CompanySocialMediaResource\Pages;
use App\Filament\Resources\CompanySocialMediaResource\RelationManagers;

class CompanySocialMediaResource extends Resource
{
    protected static ?string $model = CompanySocialMedia::class;

    protected static ?string $slug = 'social-media-section';
    protected static ?string $navigationLabel = 'Social Media';
    protected static ?string $modelLabel = 'Social Medias';
    protected static ?string $pluralLabel = 'Social Media';
    protected static ?int $navigationSort = 25;
    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([

                    Forms\Components\Placeholder::make('platform')
                    ->label('Editing Platform:')
                    ->content(fn ($record) => ucfirst($record->platform->name) ?? 'New Platform'),

                    Forms\Components\TextInput::make('url')
                        ->maxLength(255),
                    Forms\Components\Toggle::make('is_active')
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('platform')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->paginated(false)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCompanySocialMedia::route('/'),
            'create' => Pages\CreateCompanySocialMedia::route('/create'),
            'edit' => Pages\EditCompanySocialMedia::route('/{record}/edit'),
        ];
    }
}
