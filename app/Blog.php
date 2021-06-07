<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'order',
        'title',
        'resume',
        'text',
        'category_id',
        'is_destacado',
        'date',
        'image',
        'elim'
    ];
    protected $casts = [
        'order' => 'string',
        'title' => 'string',
        'resume' => 'string',
        'text'  => 'string',
        'category_id'  => 'integer',
        'is_destacado' => 'boolean',
        'date'  => 'date',
        'image' => 'json',
        'elim'  => 'boolean'
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Blog_categorias', 'category_id');
    }
}
