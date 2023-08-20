<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable = [
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

    public function sectionOptions()
{
    return $this->belongsToMany(SectionOption::class, 'product_section_option', 'product_id', 'section_option_id');
}


}


