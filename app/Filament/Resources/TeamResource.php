<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Models\Team;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $slug = 'team-members';
    protected static ?string $navigationLabel = 'Team';
    protected static ?string $modelLabel = 'Team';
    protected static ?string $pluralLabel = 'Team';
    protected static ?int $navigationSort = 20;
    protected static ?string $navigationGroup = 'About Page';
    protected static ?string $navigationParentItem = 'About Page';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('first_name')
                        ->label('First Name')
                        ->required(),
                    TextInput::make('last_name')
                        ->label('Last Name')
                        ->required(),
                    TextInput::make('email')
                        ->label('Email')
                        ->required(),
                    TextInput::make('position')
                        ->label('Member Position')
                        ->required(),
                    FileUpload::make('image')->label('Image')->disk('public')->directory('Team')->required()->maxSize(2048)
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif']),
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
                TextColumn::make('first_name')->label('First Name')->searchable()->sortable(),
                TextColumn::make('last_name')->label('Last Name')->searchable()->sortable(),
                TextColumn::make('email')->label('Email')->searchable()->sortable(),
                TextColumn::make('position')->label('Position')->searchable()->sortable(),
                ImageColumn::make('image')->limit(50)->label('Photo'),
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
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'view' => Pages\ViewTeam::route('/{record}'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
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
