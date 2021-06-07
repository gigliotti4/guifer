<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';
    protected $fillable = [
      'id', 'image', 'order', 'product_id'
    ];

    public function product() {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
