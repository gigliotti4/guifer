<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = [
        'idioma',
        'mail'
    ];

    protected $casts = [
        'idioma' => 'string',
        'mail' => 'string'
    ];
}
