<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

use App\Category;
use App\Product;
use App\Producto;
class CategoriaController extends Controller
{
    public $model;
    public function __construct() {
        $this->model = new Category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function value($k) {
        return null;
    }
    public function index(Request $request)
    {
        /*$productos = Product::all();
        foreach ($productos AS $p) {
            $images = $p->images;
            if (!empty($images)) {
                $aux = [];
                for($i = 0; $i < count($images); $i++)
                    $aux[] = ["order" => null, "image" => $images[$i]];
                $p->fill(["images" => $aux]);
                $p->save();
            }
        }
        dd("fin");*/
        $data = [];
        $data[ "view" ] = "auth.parts.categorias";
        $elementos = $this->model->where("elim", 0);
        if (isset($request->search))
            $elementos = $elementos->whereRaw( "UPPER(CONCAT_WS( ' ' ,`name`)) LIKE UPPER('%{$request->search}%')" );
        $elementos = $elementos->orderBy('order')->paginate( 15 );
        $data[ "title" ] = "Categorías";
        $data[ "elementos" ] = $elementos;
        $data[ "buttons" ] = [
            [ "i" => "fas fa-pencil-alt" , "b" => "btn-warning" , "t" => "Editar" ],
            [ "i" => "fas fa-trash-alt" , "b" => "btn-danger" , "t" => "Eliminar" ],
        ];
        if (isset($request->search))
            $data["search"] = $request->search;
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
        return (new AdmController)->store($request, $data, $this->model);
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
        return (new AdmController)->delete(self::edit($request->id), $this->model->getFillable());
    }
}
