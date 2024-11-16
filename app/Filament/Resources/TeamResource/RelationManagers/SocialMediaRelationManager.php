<?php

namespace App\Filament\Resources\TeamResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\SocialMedia;
use App\Enums\SocialMediaType;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckBoxList;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class SocialMediaRelationManager extends RelationManager
{
    protected static string $relationship = 'social_media';
    protected static ?string $modelLabel = 'platform';
    protected static ?string $pluralLabel = 'Media Platforms';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('platform')
                ->label('Platform Name')
                ->native(false)
                ->options(SocialMediaType::class)
                ->disabled(fn ($record) => !is_null($record)),
                TextInput::make('url')
                ->label('Platform Url')
                ->required()
                ->url()
                ->suffixIcon('heroicon-m-globe-alt')
                ->maxLength(255),
                Toggle::make('is_active')
                ->label('Active?')
                ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('platform')->label('Platforms')->searchable()->sortable(),
                TextColumn::make('url')->label('Url')->searchable()->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')->label('Active?'),
            ])
            ->filters([
                //
            ])
            ->paginated(false)
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->slideOver(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                ]),
            ]);
    }
}
