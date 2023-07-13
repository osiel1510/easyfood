<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    protected $fillable = [
        'nombre',
        'ubicacion',
        'telefono',
        'facebook',
        'instagram',
        'user_id',
        'costoEnvio',
        'imagen',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
