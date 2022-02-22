<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'plant',
        'image',
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'image');
    }
}
