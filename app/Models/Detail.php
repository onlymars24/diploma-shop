<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'detail_brand',
        'number',
        'descr',
        'price',
        'image',
        'count',
        'brand_id',
        'design_id',
        'generation_id',
        'modification_id',
    ];

    
}
