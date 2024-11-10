<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SettingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SettingResource\RelationManagers;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

class SettingResource extends Resource implements HasShieldPermissions
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
                    TextInput::make('meta_title')->label('Meta Title ( Company Name )')
                        ->required()
                        ->maxLength(255),
                    Textarea::make('meta_keyword')->label('Meta Keyword')
                        ->required()
                        ->helperText('Enter the meta keywords separated by commas.')
                        ->maxLength(255),
                    Textarea::make('meta_description')->label('Meta Description')
                        ->required()
                        ->maxLength(255),
                ])->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('meta_title')->label('Meta Title')->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta_keyword')->label('Meta Keyword')->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta_description')->label('Meta Description')->limit(50)
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
                Tables\Actions\BulkActionGroup::make([]),
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

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'update',
        ];
    }
}
