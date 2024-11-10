<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactSectionHeaderResource\Pages;
use App\Filament\Resources\ContactSectionHeaderResource\RelationManagers;
use App\Models\ContactSectionHeader;
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

class ContactSectionHeaderResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = ContactSectionHeader::class;

    protected static ?string $slug = 'contact-header';
    protected static ?string $navigationLabel = 'Contact Section Header';
    protected static ?string $modelLabel = 'Contact Section Header';
    protected static ?string $navigationGroup = 'Home Page';
    protected static ?string $pluralLabel = 'Contact Header ';
    protected static ?int $navigationSort = 10;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center';

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
                TextColumn::make('sub_title')->limit(10),
                TextColumn::make('description')->label('Description')->limit(70),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                ->slideOver(),
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
            'index' => Pages\ListContactSectionHeaders::route('/'),
            'create' => Pages\ViewContactSectionHeader::route('/{record}'),
            // 'edit' => Pages\EditContactSectionHeader::route('/{record}/edit'),
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
