<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionOption extends Model
{
    use HasFactory;

    protected $table = 'section_options';

    protected $fillable = [
        'restaurant_id',
        'nombre',
        'maximo',
        'minimo',
        'disponibilidad',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

}
