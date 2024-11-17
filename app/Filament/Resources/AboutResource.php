<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\About;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Group;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AboutResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AboutResource\RelationManagers;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

class AboutResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = About::class;

    protected static ?string $slug = 'company-profile';
    protected static ?string $navigationLabel = 'Company Profile';
    protected static ?string $modelLabel = 'Company Profile';
    protected static ?string $pluralLabel = 'Company Profile';
    protected static ?int $navigationSort = 20;
    protected static ?string $navigationGroup = 'About Page';


    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Profile')->schema([
                    TextInput::make('about_hero_title')
                    ->label('Banner Section Title')
                    ->required(),
                    TextInput::make('about_hero_sub_title')
                    ->label('Banner Section Sub-Title')
                    ->required(),
                    TextInput::make('about_title')
                    ->label('Main Title')
                    ->required(),
                    TextInput::make('about_sub_title')
                    ->label('Sub Main Title')
                    ->required(),
                    Textarea::make('about_summary_description')
                    ->label('Summary Description')
                    ->columnSpan(2)->required(),
                    RichEditor::make('about_description')->label('Description')
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
                    Section::make('Logo & Favicon')->schema([
                        Forms\Components\FileUpload::make('logo')->label('Logo')->disk('images')->directory('icons')->required()->maxSize(2096)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])
                            ->image()
                            ->imageEditor(),
                        Forms\Components\FileUpload::make('favicon')->label('favicon')->disk('images')->directory('icons')->required()->maxSize(2096)
                            ->image()
                            ->imageEditor(),
                            // ->acceptedFileTypes(['image/png', 'image/ico']),
                        ])->columnSpan(1),
                        Section::make('Media')->schema([
                            FileUpload::make('about_image')->label('Image')->disk('images')->required()->maxSize(4048) 
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])
                            ->image()
                            ->imageEditor(),
                            FileUpload::make('about_hero_video')->label('Background Video')->disk('images')->required()->maxSize(6096)
                            ->acceptedFileTypes(['video/mp4', 'video/mpeg', 'video/avi']),
                        ])->columnSpan(1),
                ])->columnSpan(1),

              
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('about_hero_title')->label('Banner Section Title'),
                TextColumn::make('about_hero_sub_title')->label('Banner Section Sub-Title')
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('about_title')->label('Title'),
                TextColumn::make('about_sub_title')->label('Sub Title')
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('about_description')
                    ->label('Description')
                    ->limit(50)
                    ->html()
                    ->formatStateUsing(function ($state) {
                        return \Illuminate\Support\Str::limit(strip_tags($state), 50);
                    }),
                Tables\Columns\ImageColumn::make('logo')->disk('images')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('favicon')->disk('images')
                    ->searchable(),
                ImageColumn::make('about_image')->label('Image')->disk('images')
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('about_hero_video')
                ->toggleable(isToggledHiddenByDefault: true)
                ->label('Background Video')
                ->formatStateUsing(function ($record) {
                    return '<video width="150" height="100" controls>
                                <source src="'. Storage::disk('images')->url($record->video) .'" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>';
                })
                ->html(),
            ])
            ->filters([
                //
            ])
            ->paginated(false)
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                // ->slideOver(),
            ])
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
            'index' => Pages\ListAbouts::route('/'),
            // 'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
            'view' => Pages\ViewAbout::route('/{record}'),
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
