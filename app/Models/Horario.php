<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Horario extends Model
{
    use HasFactory;


    protected $table = 'horarios';

    protected $fillable = [
        'restaurant_id',
        'day_of_week',
        'opening_time',
        'closing_time',
    ];
}

