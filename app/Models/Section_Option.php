<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section_Option extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'descripcionCorta',
        'descripcionLarga',
        'precioVenta',
        'precioCompra',
        'stock',
        'fechaRegistro',
        'pesoProducto',
    ];

}
