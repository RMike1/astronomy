<?php

namespace App\Filament\Resources;

use App\Models\Team;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckBoxList;
use App\Filament\Resources\TeamResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use App\Filament\Resources\TeamResource\Widgets\TeamStatsWidget;
use App\Filament\Resources\TeamResource\RelationManagers\SocialMediaRelationManager;


class TeamResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Team::class;

    protected static ?string $slug = 'team-members';
    protected static ?string $navigationLabel = 'Team';
    protected static ?string $modelLabel = 'Team Member';
    protected static ?string $pluralLabel = 'Team';
    protected static ?int $navigationSort = 20;
    protected static ?string $navigationGroup = 'About Page';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Team Member Information')->schema([
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
                ])->columnSpan(2)->columns(2),
                Section::make()->schema([
                    FileUpload::make('image')->label('Image')->disk('public')->directory('Team')->required()->maxSize(2048)
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])
                        ->image()
                        ->imageEditor(),
                    Toggle::make('is_active')
                        ->label('Active ?'),
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
                TextColumn::make('first_name')->label('First Name')->searchable()->sortable(),
                TextColumn::make('last_name')->label('Last Name')->searchable()->sortable(),
                TextColumn::make('email')->label('Email')->searchable()->sortable(),
                TextColumn::make('position')->label('Position')->searchable()->sortable(),
                ImageColumn::make('image')->limit(50)->label('Photo'),
                IconColumn::make('is_active')->label('Is Active')
                    ->boolean()
                    ->sortable(),
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
            SocialMediaRelationManager::class
        ];
    }

    public static function getWidgets(): array
    {
        return [
            TeamStatsWidget::class
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
