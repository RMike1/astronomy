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

class ContactSectionHeaderResource extends Resource
{
    protected static ?string $model = ContactSectionHeader::class;

    protected static ?string $slug = 'contact-header';
    protected static ?string $navigationLabel = 'Contact Section Header';
    protected static ?string $modelLabel = 'Contact Header';
    protected static ?string $navigationGroup = 'Home Page';
    // protected static ?string $navigationParentItem = 'Contacts';
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
            Textarea::make('description')
            ->label('Description')
            ->required(),
            ])->columns(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    TextColumn::make('title')->label('Title'),
                    TextColumn::make('description')->label('Description'),
            ])
            ->filters([
                //
            ])
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
            'index' => Pages\ListContactSectionHeaders::route('/'),
            'create' => Pages\ViewContactSectionHeader::route('/{record}'),
            'edit' => Pages\EditContactSectionHeader::route('/{record}/edit'),
        ];
    }
}
