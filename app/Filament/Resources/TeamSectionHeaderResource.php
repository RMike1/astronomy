<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamSectionHeaderResource\Pages;
use App\Filament\Resources\TeamSectionHeaderResource\RelationManagers;
use App\Models\TeamSectionHeader;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

class TeamSectionHeaderResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = TeamSectionHeader::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationParentItem = 'Team';
    protected static ?string $slug = 'team-section-header';
    protected static ?string $navigationLabel = 'Team Section Header';
    protected static ?string $modelLabel = 'Team Section Header';
    protected static ?string $navigationGroup = 'About Page';
    protected static ?string $pluralLabel = 'Team Section Header ';

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
                    Textarea::make('description')
                        ->label('Description')
                        ->required()
                        ->columnSpan(2),
                ]),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->limit(30),
                Tables\Columns\TextColumn::make('sub_title')->limit(10),
                Tables\Columns\TextColumn::make('description')->limit(50),
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
            'index' => Pages\ListTeamSectionHeaders::route('/'),
            // 'create' => Pages\CreateTeamSectionHeader::route('/create'),
            // 'edit' => Pages\EditTeamSectionHeader::route('/{record}/edit'),
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
