<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
 use HasFactory;

    protected $fillable = [
        'question',
    ];

      protected $casts = [
        'options' => 'array', // Or 'collection' if you prefer a Laravel Collection
    ];
}
