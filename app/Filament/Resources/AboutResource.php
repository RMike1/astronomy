<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Filament\Resources\AboutResource\RelationManagers;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $slug = 'about-page';
    protected static ?string $navigationLabel = 'About Page';
    protected static ?string $modelLabel = 'About Page';
    protected static ?string $pluralLabel = 'About ';
    protected static ?int $navigationSort = 20;
    protected static ?string $navigationGroup = 'About Page';


    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('about_hero_title')
                    ->label('Hero Title')
                    ->required(),
                    TextInput::make('about_hero_sub_title')
                    ->label('Hero Sub Title')
                    ->required(),
                    TextInput::make('about_title')
                    ->label('Title')
                    ->required(),
                    TextInput::make('about_sub_title')
                    ->label('Sub Title')
                    ->required(),
                    FileUpload::make('about_hero_video')->label('Background Video')->disk('public')->directory('About-video')->required()->maxSize(6096)
                    ->acceptedFileTypes(['video/mp4', 'video/mpeg', 'video/avi']),
                    FileUpload::make('about_image')->label('Image')->disk('public')->directory('About')->required()->maxSize(4048) 
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif']),
                    Textarea::make('about_description')->label('Description')->required()->columnSpan(2),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('about_hero_title')->label('Hero Title'),
                TextColumn::make('about_hero_sub_title')->label('Hero Sub Title')
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('about_title')->label('Title'),
                TextColumn::make('about_sub_title')->label('Sub Title')
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('about_description')->limit(50)->label('Description'),
                ImageColumn::make('about_image')->label('Image'),
                TextColumn::make('about_hero_video')
                ->label('Background Video')
                ->formatStateUsing(function ($record) {
                    return '<video width="350" height="200" controls>
                                <source src="'. asset('storage/' . $record->video) .'" type="video/mp4, video/mpeg,">
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
                Tables\Actions\EditAction::make(),
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
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
            'view' => Pages\ViewAbout::route('/{record}'),
        ];
    }
}
