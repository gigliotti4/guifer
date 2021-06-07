<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;

use App\Category;
use App\Product;
class ProductoController extends Controller
{
    public $model;
    public function __construct() {
        $this->model = new Product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        $data[ "view" ] = "auth.parts.producto";
        $data["categorias"] = Category::where("elim", 0)->orderBy('order')->pluck("name", "id");
        $elementos = $this->model::where('elim', 0);

        if (isset($request->search)) {
            $data["search"] = $request->search;
            $elementos = $elementos->whereRaw( "UPPER(CONCAT_WS( ' ' ,`code`, `title`, `subtitle`, `words`, `table`)) LIKE UPPER('%{$request->search}%')" );
        }
        $elementos = $elementos->orderBy('title')->paginate(15);
        $data[ "title" ] = "Productos";
        $data[ "elementos" ] = $elementos;
        $data[ "buttons" ] = [
            [ "i" => "fas fa-pencil-alt" , "b" => "btn-warning" , "t" => "Editar" ],
            [ "i" => "fas fa-trash-alt" , "b" => "btn-danger" , "t" => "Eliminar" ]
        ];
        return view('auth.distribuidor',compact('data'));
    }

    public function show() {}

    public function all(Request $request) {
        $rules = [
            "integer_id" => "integer",
            "file" => "required|mimes:xls,xlsx,pdf,zip,rar,7zip|max:4096"
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return [ "estado" => 0 , "mssg" => "Validación incorrecta. Solo archivos excel."];
        set_time_limit(0);
        ini_set('memory_limit', '-1');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::beginTransaction();
        DB::table('products')->where('category_id', $request->category_id)->update(['elim' => 1]);
        DB::commit();
        try {
            //DB::table('products')->truncate();
            Excel::import(new ProductsImport(Category::find($request->category_id)),$request->file('file'));
            DB::commit();
            DB::table('products')->where('category_id', $request->category_id)->where('elim', 1)->delete();
            DB::commit();
            return ["estado" => 1, "mssg" => "Registros actualizados"];
        } catch (Exception $e) {
            DB::rollback();
            return ["estado" => 0, "mssg" => "Error"];
        }
    }

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
