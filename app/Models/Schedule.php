<?php

namespace App\Models;

use App\Enums\DaysOfTheWeek;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    protected $casts = [
        'day_of_week' => DaysOfTheWeek::class
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function slots(): HasMany
    {
        return $this->hasMany(Slot::class);
    }
}
