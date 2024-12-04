<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
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
                    ->native(false)
                    ->displayFormat('M d, Y')
                    ->closeOnDateSelection()
                    ->live()
                    ->disabledDates(function () {
                        return static::getWeekendsDates();
                    })

                    ->label('Data')
                    ->required(),
                Forms\Components\Select::make('slot_id')
                    ->relationship('slot', 'dalle')
                    ->native(false)
                    ->label('Dalle Ore')
                    ->visible(function ($get): ?bool {
                        return $get('data');
                    })
                    ->options(function ($get) {
                        \Carbon\Carbon::parse($get('data'))->isMonday();

                        if (\Carbon\Carbon::parse($get('data'))->isMonday()) {

                            $weekends[] = 'true';
                        } else {
                            $weekends[] = 'false';
                        }


                        return $weekends;
                    })
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
                Tables\Columns\TextColumn::make('customer_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('service.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('timeslot_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('messaggio')
                    ->searchable(),
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
}
