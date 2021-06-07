<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";
    protected $fillable = [
        'code',
        'ficha',
        'plano',
        'title_es',
        'subtitle_es',
        'text_es',
        'table_es',
        'image',
        'keyword_es',
        'category_id'
    ];
    public function galleries(){
        return $this->hasMany('App\Gallery', 'product_id');
    }
}
