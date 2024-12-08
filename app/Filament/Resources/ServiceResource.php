<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'carbon-service-id';

    protected static ?string $navigationLabel = 'Servizi';

    protected static ?int $navigationSort = 2;






    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                /*  Forms\Components\TextInput::make('holder_id')
                    ->numeric(), */
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                Forms\Components\TextArea::make('descrizione')
                    ->columnSpanFull()
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('immagine')
                    ->required()
                    ->image()
                    ->imageEditor(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                /*  Tables\Columns\TextColumn::make('holder_id')
                    ->numeric()
                    ->sortable(), */
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descrizione')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('immagine')
                    ->circular(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }

    public static function getBreadcrumb(): string
    {
        return 'Servizi';
    }
}
