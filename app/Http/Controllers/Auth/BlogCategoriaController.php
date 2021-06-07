<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

use App\Blog_categorias;
class BlogCategoriaController extends Controller
{
    public $model;
    public function __construct() {
        $this->model = new Blog_categorias;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        $data = [];
        $data[ "view" ] = "auth.parts.blogcategorias";
        $data[ "url" ] = Route( 'blogs.index' );
        $data[ "breadcrumb" ] = "<li class='breadcrumb-item'><a href='{$data[ "url" ]}'>Novedades</a></li><li class='breadcrumb-item active'>Categorías de Blogs</li>";
        $elementos = $this->model::where('elim', 0)->orderBy('order')->paginate( 15 );
        $data[ "title" ] = "Categorías de Blogs";
        $data[ "elementos" ] = $elementos;
        $data[ "buttons" ] = [
            [ "i" => "fas fa-pencil-alt" , "b" => "btn-warning" , "t" => "Editar" ],
            [ "i" => "fas fa-trash-alt" , "b" => "btn-danger" , "t" => "Eliminar" ],
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
