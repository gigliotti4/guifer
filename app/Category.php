<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    protected $fillable = [
        "order",
        "name",
        "image",
        "is_destacado",
        "elim"
    ];
    protected $casts = [
        "order" => "string",
        "name" => "string",
        "image" => "array",
        "is_destacado" => "boolean",
        "elim" => "boolean"
    ];

    public function url() {
        return "productos/categoria/" . str_slug($this->name) . "/" . $this->id;
    }

    public function productos()
    {
        return $this->hasMany('App\Product' , 'category_id' );
    }
}
