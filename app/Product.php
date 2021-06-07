<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = [
        "category_id",
        "code",
        "is_destacado",
        "ficha",
        "plano",
        "title",
        "subtitle",
        "text",
        "words",
        "images",
        "table",
        "elim"
    ];
    protected $casts = [
        "category_id" => "integer",
        "code" => "string",
        "is_destacado" => "boolean",
        "ficha" => "string",
        "plano" => "string",
        "title" => "string",
        "subtitle" => "string",
        "text" => "string",
        "words" => "string",
        "images" => "array",
        "table" => "string",
        "elim" => "boolean"
    ];

    public function url() {
        return "productos/producto/" . str_slug($this->title) . "/" . $this->id;
    }

    public function ficha() {
        if (empty($this->ficha))
            return "";
        return "fichas/" . $this->ficha;
    }
    public function plano() {
        if (empty($this->plano))
            return "";
        return "images/planos/" . $this->plano;
    }
    public function complete($u) {
        return self::image($u);
    }
    public function images() {
        if (empty($this->images))
            return "";
        return array_map("self::complete", $this->images);
    }

    public function image($u = null) {
        if (empty($this->images))
            return "";
        if(empty($u))
            return "images/productos/{$this->images[0]["image"]}";
        else
            return "images/productos/{$u['image']}";
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
