<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Slot;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'zondicon-calendar';

    protected static ?string $navigationLabel = 'Prenotazioni';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'nome'),
                Forms\Components\Select::make('service_id')
                    ->relationship('service', 'nome')
                    ->required(),
                Forms\Components\DatePicker::make('data')
                    ->displayFormat('M d, Y')
                    ->label('Data')
                    ->live(debounce: 500)
                    ->required(),
                Forms\Components\Select::make('slot_id')
                    ->relationship('slot', 'giorno')
                    //->native(false)
                    ->label('Fascia Oraria')
                    ->options(fn(Get $get) => Slot::where('giorno', Carbon::parse($get('data'))->locale('it')->dayName)->pluck('ora', 'id'))
                    ->disabled(fn(Get $get): bool => ! filled($get('data')))
                    ->required(),
                Forms\Components\TextArea::make('messaggio')
                    ->columnSpanFull()
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.nome')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('service.nome')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slot.ora')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data')
                    ->date()
                    ->sortable(),


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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }

    public static function getBreadcrumb(): string
    {
        return 'Prenotazioni';
    }
}
