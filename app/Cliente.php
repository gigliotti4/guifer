<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'order',
        'image',
        'name',
        'elim'
    ];

    protected $casts = [
        'order' => 'string',
        'image' => 'array',
        'name' => 'string',
        'elim' => 'boolean',
    ];
}
