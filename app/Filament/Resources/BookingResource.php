<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use Filament\Tables\Actions\DeleteAction;
use App\Models\Customer;
use App\Models\Booking;
use App\Models\Slot;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Get;

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
                    ->relationship('customer', 'nome',)
                    ->getOptionLabelFromRecordUsing(fn (Customer $record) => "{$record->nome} {$record->cognome}")

                    ->label('Utente')
                    ->required(),
                Forms\Components\Select::make('service_id')
                    ->relationship('service', 'nome')
                    ->label('Servizio')
                    ->required(),
                Forms\Components\DatePicker::make('data')
                    //->native(false)
                    ->displayFormat('M d, Y')
                    //->closeOnDateSelection()
                    //->live()
                    ->live()
                    /*  ->disabledDates(function () {
                        return static::getWeekendsDates();
                    })
                    ->afterStateUpdated(fn (Set $set) => $set('slot_id', null)) */
                    ->label('Data')
                    ->required(),
                Forms\Components\Select::make('slot_id')
                    ->relationship('slot', 'giorno')

                    //->native(false)
                    ->label('Fascia Oraria')
                    ->options(function (Get $get) {
                        $bookings = Booking::all();


                        if ($bookings->isEmpty()) {
                            return Slot::where('giorno', Carbon::parse($get('data'))->locale('it')->dayName)->pluck('ora', 'id');
                        } else {

                            $reservations = Booking::where('data', $get('data'))
                                ->where('service_id', $get('service_id'))
                                ->pluck('slot_id')
                                ->toArray();
                            $times = Slot::where('giorno', Carbon::parse($get('data'))->locale('it')->dayName)
                                ->whereNot('id', $reservations)
                                ->pluck('ora', 'id');


                            return $times;
                        }
                    })
                    ->disabled(fn(Get $get): bool => ! filled($get('data')))
                    ->required(),
                /*   Forms\Components\Select::make('slot_id')
                    ->relationship('slot', 'end')
                    ->required(), */
                Forms\Components\MarkdownEditor::make('messaggio')
                    ->label('Messaggio')
                    ->columnSpanFull()
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.nome')
                    ->label('Utente')
                    ->sortable(),
                Tables\Columns\TextColumn::make('service.nome')
                    ->label('Servizio')
                    ->sortable(),
                Tables\Columns\TextColumn::make('slot.ora')
                    ->label('Ora')
                    ->sortable(),
                /*   Tables\Columns\TextColumn::make('messaggio')
                    ->searchable(), */
                Tables\Columns\TextColumn::make('data')
                    ->label('Data')
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }

    protected static function getWeekendsDates(): array
    {
        $start = Carbon::now()->addMonth()->startOfMonth();
        $end = $start->copy()->addMonth()->endOfMonth();

        $period = CarbonPeriod::create($start, $end);

        $weekends = [];
        foreach ($period as $date) {
            if ($date->isWeekend()) {
                $weekends[] = $date->format('Y-m-d');
            }
        }

        return $weekends;
    }

    public static function getBreadcrumb(): string
    {
        return 'Prenotazioni';
    }
}
