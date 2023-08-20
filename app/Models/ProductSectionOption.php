<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSectionOption extends Model
{
    use HasFactory;

    protected $table = 'product_section_option';

    protected $fillable = [
        'product_id',
        'section_option_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_section_option', 'product_id', 'section_option_id');
    }

    public function sectionOptions()
    {
        return $this->belongsToMany(SectionOption::class, 'product_section_option', 'section_option_id', 'product_id');
    }
}

