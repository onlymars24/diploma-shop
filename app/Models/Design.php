<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand_id',
    ];

    public function generations()
    {
        return $this->hasMany(Generation::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
