<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TermsOfUseResource\Pages;
use App\Filament\Resources\TermsOfUseResource\RelationManagers;
use App\Models\TermsOfUse;
use Faker\Provider\Lorem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;


class TermsOfUseResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = TermsOfUse::class;
    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';
    protected static ?string $slug = 'terms-of-use';
    protected static ?string $navigationLabel = 'Terms of use';
    protected static ?string $modelLabel = 'Terms of use';
    protected static ?string $pluralLabel = 'Terms of use';
    protected static ?int $navigationSort = 30;
    protected static ?string $navigationGroup = 'Terms & Policy';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Terms Of Use')->schema([
                    TextInput::make('title')
                        ->label('Title')
                        ->required(),
                    TextInput::make('sub_title')
                        ->label('Sub Title')
                        ->required(),
                    RichEditor::make('description')->label('Description')
                        ->toolbarButtons([
                            'attachFiles',
                            'blockquote',
                            'bold',
                            'bulletList',
                            'codeBlock',
                            'h2',
                            'h3',
                            'italic',
                            'link',
                            'orderedList',
                            'redo',
                            'strike',
                            'underline',
                            'undo',
                        ])
                        ->fileAttachmentsDisk('public')
                        ->fileAttachmentsDirectory('terms-images')
                        ->fileAttachmentsVisibility('public')
                        ->columnSpan(2)->required(),
                ])->columnSpan(2)->columns(2),
                Section::make('Media')->schema([
                    FileUpload::make('background_image')->label('Background Image')->disk('public')->directory('Terms')->required()->maxSize(3048)
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif']),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Title'),
                TextColumn::make('sub_title')->label('Sub Title'),
                TextColumn::make('description')
                    ->label('Description')
                    ->html()
                    ->formatStateUsing(function ($state) {
                        return \Illuminate\Support\Str::limit(strip_tags($state), 50);
                    }),
                ImageColumn::make('background_image')->label('Background Image'),
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
                Tables\Actions\BulkActionGroup::make([]),
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
            'index' => Pages\ListTermsOfUses::route('/'),
            'create' => Pages\CreateTermsOfUse::route('/create'),
            'edit' => Pages\EditTermsOfUse::route('/{record}/edit'),
            'view' => Pages\ViewTermsOfUse::route('/{record}'),
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
