<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modification extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'generation_id',
    ];

    public function details()
    {
        return $this->hasMany(Detail::class);
    }
}
