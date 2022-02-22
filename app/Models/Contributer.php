<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contributer extends Model
{
    use HasFactory;

    protected $fillable = [
        'contributer',
        'plant',
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant');
    }

    public function contribution()
    {
        return $this->belongsTo(User::class, 'contributer');
    }
}
