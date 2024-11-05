<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceSectionHeaderResource\Pages;
use App\Filament\Resources\ServiceSectionHeaderResource\RelationManagers;
use App\Models\ServiceSectionHeader;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

class ServiceSectionHeaderResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = ServiceSectionHeader::class;

    protected static ?string $slug = 'service-header';
    protected static ?string $navigationLabel = 'Service Header';
    protected static ?string $modelLabel = 'Service Section Header';
    protected static ?string $navigationGroup = 'Home Page';
    protected static ?string $navigationParentItem = 'Service Section';
    protected static ?string $pluralLabel = 'Service Section Header';

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
                TextColumn::make('title')->label('Title'),
                TextColumn::make('description')->label('Description')->limit(70),
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
            'index' => Pages\ListServiceSectionHeaders::route('/'),
            'view' => Pages\ViewServiceSectionHeader::route('/{record}'),
            'edit' => Pages\EditServiceSectionHeader::route('/{record}/edit'),
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
