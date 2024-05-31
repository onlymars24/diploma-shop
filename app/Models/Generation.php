<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'design_id',
    ];

    public function modifications()
    {
        return $this->hasMany(Modification::class);
    }
    
    public function design()
    {
        return $this->belongsTo(Design::class);
    }
}
