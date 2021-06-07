<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        "key",
        "option"
    ];
    protected $casts = [
        'key' => 'string',
        'option' => 'array',
    ];
}
