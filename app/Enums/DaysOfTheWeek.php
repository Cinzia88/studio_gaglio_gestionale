<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum DaysOfTheWeek: int implements HasLabel
{
    case Lunedì = 1;
    case Martedì = 2;
    case Mercoledì = 3;
    case Giovedì = 4;
    case Venerdì = 5;


    public function getLabel(): ?string
    {
        return $this->name;
    }
}
