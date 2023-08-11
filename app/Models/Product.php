<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable = [
        'section_options_id',
        'sections_id',
        'nombre',
        'disponibilidad',
        'imagen',
        'descripcion',
        'precio',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'sections_id');
    }

    public function sectionOption()
    {
        return $this->belongsTo(Section_Option::class, 'section_options_id');
    }

}


