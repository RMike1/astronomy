<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\HeroSection;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\HtmlColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HeroSectionResource\Pages;
use App\Filament\Resources\HeroSectionResource\RelationManagers;

class HeroSectionResource extends Resource
{
    protected static ?string $model = HeroSection::class;

    protected static ?string $slug = 'hero-section';
    protected static ?string $navigationGroup = 'Home Page';
    protected static ?string $navigationLabel = 'Hero Section';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $pluralLabel = 'Home Page Header';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([

                    TextInput::make('title')->label('Title')->required(),
                    TextInput::make('description')->label('Decription')->required(),
                    ])->columns(1),
                Section::make()->schema([
                    FileUpload::make('video')->label('Background Video')->disk('public')->directory('Hero-Videos')->maxSize(5096)
                    ->acceptedFileTypes(['video/mp4', 'video/mpeg', 'video/avi']),

                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                
                TextColumn::make('video')
                ->label('Background Video')
                ->formatStateUsing(function ($record) {
                    return '<video width="150" height="100" controls>
                                <source src="'. asset('storage/' . $record->video) .'" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>';
                })
                ->html(),
                TextColumn::make('description'),
            
                 
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListHeroSections::route('/'),
            'view' => Pages\ViewHeroSection::route('/{record}'),
            'edit' => Pages\EditHeroSection::route('/{record}/edit'),
        ];
    }
}
