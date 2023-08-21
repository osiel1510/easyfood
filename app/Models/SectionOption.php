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

    public function options()
{
    return $this->hasMany(Option::class, 'section_options_id');
}


    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function products()
{
    return $this->belongsToMany(Product::class, 'product_section_option', 'section_option_id', 'product_id');
}


}
