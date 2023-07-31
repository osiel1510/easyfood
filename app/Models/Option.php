<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['section_options_id', 'restaurant_id', 'nombre', 'precio', 'disponibilidad'];

    public function sectionOption()
    {
        return $this->belongsTo(SectionOption::class, 'section_options_id');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
