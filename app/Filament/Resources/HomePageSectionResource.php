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

    protected static ?string $navigationGroup = 'Home Pages';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Home section';

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
                FileUpload::make('image')->label('Image')->disk('public')->directory('Home_Section')->required(),
                Toggle::make('is_active')
                ->label('Active'),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Title')->searchable()->sortable(),
                TextColumn::make('sub_title')->label('Sub Title')->searchable()->sortable(),
                ToggleColumn::make('is_active')->label('Active')->sortable(),
                ImageColumn::make('image')->label('Image')->disk('public'),
                TextColumn::make('summary_description')->label('Summary Description')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
        ];
    }
}
