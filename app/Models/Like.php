<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'image');
    }
}
