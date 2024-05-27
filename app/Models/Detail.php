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
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function design()
    {
        return $this->belongsTo(Design::class);
    }
    public function generation()
    {
        return $this->belongsTo(Generation::class);
    }
    public function modification()
    {
        return $this->belongsTo(Modification::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    
}
