<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $fillable = [
        'orden',
        'nombre',
        'nombre->es',
        'nombre->en',
        'nombre->it',
        'marca_id',
        'familia_id',
        'contenido',
        'image',
        'elim'
    ];

    protected $casts = [
        'orden' => 'string',
        'nombre' => 'array',
        'marca_id' => 'integer',
        'familia_id' => 'integer',
        'contenido' => 'array',
        'image' => 'array',
        'elim' => 'boolean',
    ];

    public function familias()
    {
        return $this->hasMany('App\Familia','familia_id');
    }
    public function padre()
    {
        return $this->belongsTo( 'App\Familia' , 'familia_id' );
    }
    public function marcaS()
    {
        return $this->belongsTo( 'App\Marca' , 'marca_id' );
    }
    public function marca()
    {
        return self::marcaSearch($this);
    }
    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
    public function allRecursivo($data, &$all) {
        $aux = $data->familias()->whereNull("elim")->get();
        if($aux->isEmpty())
            $all[] = $data;
        else {
            foreach($aux AS $a)
                self::allRecursivo($a, $all);
        }
    }
    public function todos() {
        $all = [];
        self::allRecursivo($this, $all);
        return $all;
    }

    public function marcaSearch($data) {
        if(!empty($data->marca_id))
            return $data->marcaS;
        return self::marcaSearch($data->padre);
    }
    public function padresRecursivo( $data , &$padres , $only_id ) {
        if( empty( $data->padre ) ) {
            if( empty( $only_id ) )
                $padres[] = $data;
            else
                $padres[] = $data->id;
        } else {
            if( empty( $only_id ) )
                $padres[] = $data;
            else
                $padres[] = $data->id;
            self::padresRecursivo( $data->padre , $padres , $only_id );
        }
    }
    public function padres( $only_id = null ) {
        $padres = [];
        self::padresRecursivo( $this , $padres , $only_id );
        return array_reverse( $padres );
    }
}
