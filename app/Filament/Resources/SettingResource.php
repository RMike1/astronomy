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
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
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
    protected static ?int $navigationSort = 80;
    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('meta_title')->label('Meta Title')
                        ->required()
                        ->maxLength(255),

                    Textarea::make('meta_keyword')->label('Meta Keyword')
                        ->required()
                        ->helperText('Enter the meta keywords separated by commas (,)')
                        ->maxLength(255),
                    FileUpload::make('meta_image')->label('Image')->disk('images')->required()->maxSize(6096)
                        ->acceptedFileTypes(['image/jpeg', 'image/png'])
                        ->image()
                        ->helperText('Defines the image shown in the social media card when content is shared.')
                        ->imageEditor(),
                    Textarea::make('meta_description')->label('Meta Description')
                        ->required()
                        ->maxLength(255),

                    Builder::make('more_seo_metadata')
                        ->label('more')
                        ->blocks([
                            Builder\Block::make('meta_data')
                                ->label('meta data')
                                ->schema([
                                    TextInput::make('key')
                                        ->label('key')
                                        ->required()
                                        ->maxLength(100),
                                    Textarea::make('value')
                                        ->label('value')
                                        ->maxLength(200)
                                        ->required(),
                                ]),
                        ])->columns(2)
                        ->blockNumbers(false)
                ])->columns(1),
                Section::make()->schema([
                    Builder::make('social_media_seo_meta_data')
                        ->label('Social Media Seo Meta Data')
                        ->blocks([
                            Builder\Block::make('twitter_seo_metadata')
                            ->label('Twitter Seo Metadata')
                                ->schema([
                                    TextInput::make('key')
                                        ->label('key')
                                        ->maxLength(100)
                                        ->required(),
                                    Textarea::make('value')
                                        ->label('value')
                                        ->maxLength(200)
                                        ->required(),
                                ]),

                            Builder\Block::make('other_social_media_seo_metadata')
                                ->label('Other Platforms Seo Metadata')
                                ->schema([
                                    TextInput::make('key')
                                        ->label('key')
                                        ->maxLength(100)
                                        ->required(),
                                    Textarea::make('value')
                                        ->label('value')
                                        ->maxLength(200)
                                        ->required(),
                                ]),
                        ])->blockNumbers(false),

                ])->columns(1),
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
            // 'create' => Pages\CreateSetting::route('/create'),
            // 'view' => Pages\ViewSetting::route('/{record}'),
            // 'edit' => Pages\EditSetting::route('/{record}/edit'),
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
