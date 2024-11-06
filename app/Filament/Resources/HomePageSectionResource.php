<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\HomePageSection;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\HtmlColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HomePageSectionResource\Pages;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use App\Filament\Resources\HomePageSectionResource\RelationManagers;

class HomePageSectionResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = HomePageSection::class;

    protected static ?string $slug = 'home-section';
    protected static ?string $navigationLabel = 'Home Page Contents';
    protected static ?string $modelLabel = 'Home Page Content';
    protected static ?string $navigationGroup = 'Home Page';

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->description('Home Page Contents...')->collapsible()->schema([
                    Tabs::make('Content')->tabs([
                        Tab::make('Content details')->icon('heroicon-o-home-modern')->schema([
                            TextInput::make('title')->maxLength(150)->minLength(2)
                                ->label('Title')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(function (string $operation, string $state, $set) {
                                    if ($operation === 'edit') {
                                        return;
                                    }
                                    $set('slug', Str::slug($state));
                                }),
                            TextInput::make('slug')->unique(ignoreRecord: true)->maxLength(150)
                                ->label('Slug')
                                ->readOnly(fn($record) => true)
                                ->required(),
                            TextInput::make('sub_title')
                                ->label('Sub Title')
                                ->required(),

                            Select::make('text_position')
                                ->label('Text Position')
                                ->options([
                                    'right' => 'Right Position',
                                    'left' => 'Left Position',
                                ])
                                ->required(),
                            Textarea::make('summary_description')->label('Summary Description')->required()->columnSpan(2),

                        ])->columnSpan(2)->columns(2),
                        Tab::make('Meta')->icon('heroicon-o-cog-6-tooth')->schema([
                            Forms\Components\Textarea::make('meta_title')->label('Meta Title')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\Textarea::make('meta_keyword')->label('Meta Keyword')
                                ->required()
                                ->maxLength(255),

                            Forms\Components\Textarea::make('meta_description')->label('Meta Description')
                                ->columnSpan(2)
                                ->required(),
                        ])->columnSpan(2)->columns(2),
                    ])->columnSpan(2)->columns(2)->persistTabInQueryString(),
                    RichEditor::make('full_description')->label('Full Description')->columnSpan(2)->required(),
                ])->columnSpan(2)->columns(2),
                Section::make('Media')->collapsible()->schema([
                    FileUpload::make('image')->label('Image')->disk('public')->directory('Home-Section-images')->required()->maxSize(6096)
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif']),
                    FileUpload::make('background_video')->label('Background Video')->disk('public')->directory('Home-Section-videos')->visibility('public')->required()->maxSize(6096)
                        ->acceptedFileTypes(['video/mp4', 'video/mpeg', 'video/avi']),
                    Select::make('background_type')
                        ->label('Select Background For Details page')
                        ->options([
                            'video' => 'Video',
                            'image' => 'Image',
                        ])
                        ->required(),

                    Toggle::make('is_active')
                        ->label('Is Active ?'),

                ])->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('counter')
                    ->label('No.')
                    ->getStateUsing(function ($rowLoop, $record) {
                        return $rowLoop->iteration;
                    })
                    ->sortable(false),
                TextColumn::make('title')->label('Title')->searchable()->sortable(),
                TextColumn::make('slug')->label('Slug')->searchable()->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('sub_title')->label('Sub Title')->searchable()->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('summary_description')->label('Summary Description')->limit(50)->searchable()->sortable(),
                ImageColumn::make('image')->label('Background Image')->disk('public'),


                TextColumn::make('background_video')
                    ->label('Background Video')
                //     ->formatStateUsing(function ($record) {
                //             return '<video width="200" height="200" controls>
                //                     <source src="'.Storage::url($record->video).'" type="video/mp4">
                //                     Your browser does not support the video tag.
                //                 </video>';

                    ->getStateUsing(function ($record) {
                        return '<video width="200" height="200" controls>
                                    <source src="'.Storage::url($record->video).'" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>';
                    })
                    ->html()
                    ->wrap(),



                    // HtmlColumn::make('background_video')
                    // ->label('Video')
                    // ->getStateUsing(function ($record) {
                    //     return '<video width="200" height="200" controls>
                    //                 <source src="' . asset('storage/' . $record->video) . '" type="video/mp4">
                    //                 Your browser does not support the video tag.
                    //             </video>';
                    // }),    

                IconColumn::make('is_active')->label('Is Active')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('meta_keyword')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('meta_title')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('meta_description')
                    ->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                Filter::make('Published Contents')->query(function (Builder $query): Builder {
                    return $query->where('is_active', true);
                }),
                Filter::make('UnPublished Contents')->query(function (Builder $query): Builder {
                    return $query->where('is_active', false);
                })
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListHomePageSections::route('/'),
            'create' => Pages\CreateHomePageSection::route('/create'),
            'edit' => Pages\EditHomePageSection::route('/{record}/edit'),
            'view' => Pages\ViewHomePageSection::route('/{record}'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'restore',
            'restore_any',
            'delete',
            'delete_any',
            'force_delete',
            'force_delete_any',
        ];
    }
}
