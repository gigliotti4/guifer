<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str as Str;


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
        return "productos/categoria/" . Str::slug($this->name) . "/" . $this->id;
    }

    public function productos()
    {
        return $this->hasMany('App\Product' , 'category_id' );
    }
}
