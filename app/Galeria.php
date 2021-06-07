<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = "galerias";
    protected $fillable = [
        'orden',
        'image',
        'video',
        'nombre',
        'elim'
    ];

    protected $casts = [
        'order' => 'string',
        'image' => 'array',
        'video' => 'string',
        'nombre' => 'string',
        'elim' => 'boolean',
    ];
}
