<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use Filament\Tables\Actions\DeleteAction;

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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'nome')
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
                        return Slot::query()->where('giorno', Carbon::parse($get('data'))->locale('it')->dayName)->pluck('ora', 'id');
                    })
                    ->disabled(fn(Get $get): bool => ! filled($get('data')))


                    /*    ->visible(function ($get): ?bool {
                        return $get('data');
                    })
                    ->getOptionLabelFromRecordUsing(function (Slot $record, Get $get) {
                        if(\Carbon\Carbon::parse($get('data'))->isMonday()) {
                          Slot::query()->where(['slot_id', 1])->get();

                        }
                        return "{$record->dalle} - {$record->alle}";
                    }) */

                    /*  ->options(function ($get) {

                        Slot::query()->where(['giorno', \Carbon\Carbon::parse($get('data'))->isMonday()])->get();
                       /*  \Carbon\Carbon::parse($get('data'))->isMonday();

                        if (\Carbon\Carbon::parse($get('data'))->isMonday()) {

                            $weekends[] = 'true';
                        } else {
                            $weekends[] = 'false';
                        }


                        return $weekends;
                    }) */

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
                    ->sortable(),
                Tables\Columns\TextColumn::make('service.nome')
                    ->sortable(),
                Tables\Columns\TextColumn::make('slot.ora')
                    ->sortable(),
                /*   Tables\Columns\TextColumn::make('messaggio')
                    ->searchable(), */
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


    public function getAvailableTimesForDate(string $date): array
    {
        $date                  = Carbon::parse($date);
        $startPeriod           = $date->copy()->hour(9);
        $endPeriod             = $date->copy()->hour(17);
        $times                 = CarbonPeriod::create($startPeriod, '1 hour', $endPeriod);
        $availableReservations = [];

        $reservations = Slot::whereDate('start_time', $date)
            ->pluck('start_time')
            ->toArray();

        $availableTimes = $times->filter(function ($time) use ($reservations) {
            return ! in_array($time, $reservations);
        })->toArray();

        foreach ($availableTimes as $time) {
            $key                         = $time->format('H');
            $availableReservations[$key] = $time->format('H:i');
        }

        return $availableReservations;
    }
}
