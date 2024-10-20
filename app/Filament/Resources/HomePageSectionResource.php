<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\HomePageSection;
use Filament\Resources\Resource;
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
use App\Filament\Resources\HomePageSectionResource\Pages;
use App\Filament\Resources\HomePageSectionResource\RelationManagers;

class HomePageSectionResource extends Resource
{
    protected static ?string $model = HomePageSection::class;

    protected static ?string $slug = 'home-section';
    protected static ?string $navigationLabel = 'Home Section';
    protected static ?string $modelLabel = 'Home section';
    protected static ?string $navigationGroup = 'Home Page';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('title')
                    ->label('Title')
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

                    Textarea::make('summary_description')->label('Summary Description')->required(),
                    RichEditor::make('full_description')->label('Full Description')->columnSpan(2)->required(),
                ])->columns(2),
                Section::make()->schema([
                    FileUpload::make('background_video')->label('Background Video')->disk('public')->directory('Home-Section-videos')->required()->maxSize(6096)
                    ->acceptedFileTypes(['video/mp4', 'video/mpeg', 'video/avi']),
                    FileUpload::make('image')->label('Image')->disk('public')->directory('Home-Section-images')->required()->maxSize(6096)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif']),
                    Select::make('background_type')
                    ->label('Choose Background For Single page')
                    ->options([
                        'video' => 'Video',
                        'image' => 'Image',
                    ])
                    ->required(),
    
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
                    return $rowLoop->iteration;
                })
                ->sortable(false),
                TextColumn::make('title')->label('Title')->searchable()->sortable(),
                TextColumn::make('sub_title')->label('Sub Title')->searchable()->sortable(),
                ImageColumn::make('image')->label('Background Image')->disk('public'),
                TextColumn::make('background_video')
                ->label('Background Video')
                ->formatStateUsing(function ($record) {
                    return '<video width="350" height="200" controls>
                                <source src="'. asset('storage/' . $record->video) .'" type="video/mp4, video/mpeg,">
                                Your browser does not support the video tag.
                            </video>';
                })
                ->html(),
                ToggleColumn::make('is_active')->label('Active')->sortable(),
                TextColumn::make('summary_description')->label('Summary Description')->limit(50)->searchable()->sortable(),
            ])
            ->filters([
                //
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
}
