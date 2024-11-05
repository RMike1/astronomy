<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrivacyPolicyResource\Pages;
use App\Filament\Resources\PrivacyPolicyResource\RelationManagers;
use App\Models\PrivacyPolicy;
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

class PrivacyPolicyResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = PrivacyPolicy::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $slug = 'privacy-policy';
    protected static ?string $navigationLabel = 'Privacy Policy';
    protected static ?string $modelLabel = 'Privacy Policy';
    protected static ?string $pluralLabel = 'Privacy Policy';
    protected static ?int $navigationSort = 30;
    protected static ?string $navigationGroup = 'Terms & Policy';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('title')
                    ->label('Title')
                    ->required(),
                    FileUpload::make('background_image')->label('Background Image')->disk('public')->directory('privacy-background-images')->required()->maxSize(3048) 
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif']),
                ])->columns(2),
                Section::make()->schema([
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
                ->fileAttachmentsDirectory('privacy-images')
                ->fileAttachmentsVisibility('public')
                ->columnSpan(2)->required(),
            ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Title'),
                ImageColumn::make('background_image')->label('Image'),
                TextColumn::make('description')
                ->label('Description')
                ->html() 
                ->formatStateUsing(function ($state) {
                    return \Illuminate\Support\Str::limit(strip_tags($state), 50);
                }),
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
            'index' => Pages\ListPrivacyPolicies::route('/'),
            'create' => Pages\CreatePrivacyPolicy::route('/create'),
            'view' => Pages\ViewPrivacyPolicy::route('/{record}'),
            'edit' => Pages\EditPrivacyPolicy::route('/{record}/edit'),
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
