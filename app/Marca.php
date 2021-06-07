<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = [
        'orden',
        'image',
        'portada',
        'nombre',
        'text',
        'detalle',
        'elim'
    ];

    protected $casts = [
        'orden' => 'string',
        'image' => 'array',
        'portada' => 'array',
        'nombre' => 'string',
        'text' => 'array',
        'detalle' => 'array',
        'elim' => 'boolean',
    ];

    public function familias()
    {
        return $this->hasMany('App\Familia');
    }
    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
}
