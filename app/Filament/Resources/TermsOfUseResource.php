<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Faker\Provider\Lorem;
use App\Models\TermsOfUse;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TermsOfUseResource\Pages;
use App\Filament\Resources\TermsOfUseResource\RelationManagers;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;


class TermsOfUseResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = TermsOfUse::class;
    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';
    protected static ?string $slug = 'terms-of-use';
    protected static ?string $navigationLabel = 'Terms of use';
    protected static ?string $modelLabel = 'Terms of use';
    protected static ?string $pluralLabel = 'Terms of use';
    protected static ?int $navigationSort = 25;
    protected static ?string $navigationGroup = 'Terms & Policy';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Terms Of Use')->schema([
                    TextInput::make('title')
                        ->label('Title')
                        ->required(),
                    TextInput::make('sub_title')
                        ->label('Sub Title')
                        ->required(),
                    RichEditor::make('description')->label('Description')
                        ->toolbarButtons([
                            'attachFiles',
                            'blockquote',
                            'bold',
                            'bulletList',
                            'codeBlock',
                            'h2',
                            'h3',
                            'italic',
                            'link',
                            'orderedList',
                            'redo',
                            'strike',
                            'underline',
                            'undo',
                        ])
                        ->fileAttachmentsDisk('images')
                        ->fileAttachmentsVisibility('public')
                        ->columnSpan(2)->required(),
                ])->columnSpan(2)->columns(2),

                Group::make()->schema([
                    Section::make('Media')->schema([
                        FileUpload::make('background_image')->label('Background Image')->disk('images')->required()->maxSize(3048)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])
                            ->image()
                            ->imageEditor(),
                    ])->columnSpan(1),
                    Section::make('Meta Data')->schema([
                        TextInput::make('meta_title')->label('Meta Title ( Page Name )')
                            ->maxLength(255)
                            ->required(),
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
                            ->maxLength(255)
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Builder::make('more_seo_metadata')
                            ->label('more')
                            ->blocks([
                                Forms\Components\Builder\Block::make('meta_data')
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
                            ->blockNumbers(false),
                        Section::make()->schema([
                            Forms\Components\Builder::make('social_media_seo_meta_data')
                                ->label('Social Media Seo Meta Data')
                                ->blocks([
                                    Forms\Components\Builder\Block::make('twitter_seo_metadata')
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

                                    Forms\Components\Builder\Block::make('other_social_media_seo_metadata')
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
                    ])->columnSpan(1),


                ])->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Title'),
                TextColumn::make('sub_title')->label('Sub Title')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('description')
                    ->label('Description')
                    ->html()
                    ->formatStateUsing(function ($state) {
                        return \Illuminate\Support\Str::limit(strip_tags($state), 50);
                    }),
                TextColumn::make('meta_title')->label('Meta Title')->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('meta_keyword')->label('Meta Keywords')->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('meta_description')->label('Meta Description')->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                ImageColumn::make('background_image')->label('Background Image'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->paginated(false)
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
            'index' => Pages\ListTermsOfUses::route('/'),
            // 'create' => Pages\CreateTermsOfUse::route('/create'),
            'edit' => Pages\EditTermsOfUse::route('/{record}/edit'),
            'view' => Pages\ViewTermsOfUse::route('/{record}'),
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
