<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $slug = 'settings';
    protected static ?string $navigationLabel = 'S.E.O Management';
    protected static ?string $modelLabel = 'Meta Tags';
    protected static ?string $pluralLabel = 'SEO Configurations';
    protected static ?int $navigationSort = 25;
    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                Forms\Components\Textarea::make('meta_keyword')->label('Meta Keyword')
                    ->maxLength(255),
                Forms\Components\Textarea::make('meta_title')->label('Meta Title')
                    ->maxLength(255),
                Forms\Components\Textarea::make('meta_description')->label('Meta Description')
                    ->maxLength(255)->columnSpanFull(),
                Forms\Components\FileUpload::make('logo')->label('Logo')->disk('public')->directory('settings')->required()->maxSize(2096)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif']),
                Forms\Components\FileUpload::make('favicon')->label('favicon')->disk('public')->directory('settings')->required()->maxSize(2096)
                    ->acceptedFileTypes(['image/png', 'image/ico']),
            ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    Tables\Columns\TextColumn::make('meta_keyword')->limit(50)
                        ->searchable(),
                    Tables\Columns\TextColumn::make('meta_title')->limit(50)
                        ->searchable(),
                    Tables\Columns\TextColumn::make('meta_description')->limit(50)
                        ->searchable(),
                    Tables\Columns\ImageColumn::make('logo')
                        ->searchable(),
                    Tables\Columns\ImageColumn::make('favicon')
                        ->searchable(),
            ])
            ->filters([
                //
            ])
            ->paginated(false)
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'view' => Pages\ViewSetting::route('/{record}'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
