<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

use App\Familia;
use App\Marca;
class FamiliaController extends Controller
{
    public $model;
    public function __construct() {
        $this->model = new Familia;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id = null)
    {
        $data = [];
        $data[ "view" ] = "auth.parts.familia";
        $elementos = empty($id) ? $this->model->whereNull("familia_id") : $this->model::find($id)->familias();

        if (isset($request->search)) {
            $data["search"] = $request->search;
            $elementos = $elementos->whereRaw( "UPPER(CONCAT_WS( ' ' ,`nombre`, `contenido`)) LIKE UPPER('%{$request->search}%')" );
        }
        $elementos = $elementos->whereNull('elim')->orderBy('orden')->paginate( 15 );

        foreach($elementos AS $e)
            $e["elementos"] = $e->familias()->count();

        $data[ "url" ] = Route( 'productos.index' );
        $data[ "breadcrumb" ] = "<li class='breadcrumb-item'><a href='{$data[ "url" ]}'>Productos</a></li>";
        if(!empty($id)) {
            $data["url_search"] = URL::to("adm/producto/familias/{$id}/elementos");
            $url = route("familias.index");
            $data["breadcrumb"] .= "<li class='breadcrumb-item'><a href='{$url}'>Familias de Productos</a></li>";
            $elemento = $this->model::find($id);
            $aux = $elemento->padres();
            foreach($aux AS $a) {
                $url = URL::to("adm/producto/familias/{$a->id}/elementos");
                $data[ "breadcrumb" ] .= "<li class='breadcrumb-item'><a href='{$url}'>{$a->nombre['es']}</a></li>";
            }
        } else
            $data["breadcrumb"] .= "<li class='breadcrumb-item active'>Familias de Productos</li>";
        $data[ "marcas" ] = Marca::whereNull('elim')->orderBy('orden')->pluck( 'nombre' , 'id' );
        $data["marcas_complete"] = Marca::whereNull('elim')->orderBy('orden')->get();
        $data[ "title" ] = "Familias de Productos";
        $data[ "elementos" ] = $elementos;
        $data[ "buttons" ] = [
            [ "i" => "fas fa-pencil-alt" , "b" => "btn-warning" , "t" => "Editar" ],
            [ "i" => "fas fa-trash-alt" , "b" => "btn-danger" , "t" => "Eliminar" ]
        ];
        return view('auth.distribuidor',compact('data'));
    }

    public function show() {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $data = null)
    {
        //try {
            $OBJ = (new AdmController)->object( $request , $data );
            //dd($OBJ);
            if(is_null($data)) {
                $this->model::create($OBJ);
                echo 1;
            } else {
                $data->fill($OBJ);
                $data->save();
                echo 1;
            }
        /*} catch (\Throwable $th) {
            echo 0;
        }*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->model::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = self::edit($id);
        return self::store($request,$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            (new AdmController)->delete( self::edit( $request->all()[ "id" ] ) , $this->model->getFillable() );
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
}
