<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

use App;
use App\Contenido;
use App\Slider;
use App\Empresa;
use App\Cliente;
use App\Galeria;
use App\Blog;
use App\Blog_categorias;
use App\Product;
use App\Marca;
use App\Familia;
use App\Category;
class GeneralController extends Controller
{
    public function __construct() {}

    function section($arr, $item) {
        $search = $item === "home" ? "" : $item;
        for($i = 0; $i < count($arr); $i++) {
            if($arr[$i]["LINK"] == "/{$search}")
                return $arr[$i];
        }
        return null;
    }
    public function datos( $link = null ) {
        $datos = Empresa::first();
        if( empty( $link ) )
            $link = "home";
        $section = self::section($datos->sections, $link);
        $data = [
            "empresa" => $datos,
            "contenido" => Contenido::where( "section", $section["FUNCTION"])->first(),
            "slider" => Slider::where( "section", $section["FUNCTION"])->where( "elim" , 0 )->orderBy( "order" )->get(),
            "terminos" => Contenido::where( "section" , "terminos" )->first(),
            "metadato" => [
                "description" => "",
                "keywords" => ""
            ],
            "section" => $section,
            "title" => $section["NAME"]
        ];
        if(isset($datos->metadatos[$section["FUNCTION"]])) {
            $data['metadato']['description'] = $datos->metadatos[$section["FUNCTION"]]["description"];
            $data['metadato']['keywords'] = $datos->metadatos[$section["FUNCTION"]]["keywords"];
        }
        return $data;
    }

    public function index($link = null) {
        if(empty($link) || $link == "index")
            $link = "home";
        $data = self::datos($link);
        $data[ "view" ] = "page.{$data["section"]["FUNCTION"]}";
        switch($data["section"]["FUNCTION"]) {
            case "home":
                $categorias = Category::whereNotNull("is_destacado")->where("elim", 0)->orderBy("order")->get();
                $productos = Product::whereNotNull("is_destacado")->where("elim", 0)->orderBy("code")->get();
                $data["destacado"] = $categorias->merge($productos);
            break;
            case "blogs":
                $data["elementos"] = [];
                $data["elementos"]["blogs_destacado"] = Blog::where("elim", 0)->where( "is_destacado" , 1 )->orderBy( "order" )->take( 3 )->get();
                $data["elementos"]["blogs"] = Blog::where("elim", 0)->whereNull( "is_destacado" )->orderBy( "date" , "DESC" )->simplePaginate( 8 );
                $data["elementos"]["blog_categorias"] = Blog_categorias::where("elim", 0)->get( );
            break;
            case "galeria":
                $data["elementos"] = [];
                $data["elementos"]["image"] = Galeria::whereNull("elim")->whereNull("video")->whereNotNull("image")->orderBy("orden")->get();
                $data["elementos"]["video"] = Galeria::whereNull("elim")->whereNull("image")->whereNotNull("video")->orderBy("orden")->get();
            break;
            case "clientes":
                $data[ "elementos" ] = Cliente::where("elim", 0)->orderBy("order")->get();
            break;
            case "productos":
                $data["elementos"] = Category::where("elim", 0)->orderBy("order")->get();
            break;
        }

        return view( 'layouts.main' ,compact( 'data' ) );
    }

    public function search(Request $request) {
        $data = self::datos("productos");
        $productos = Product::where("elim", 0);
        $productos = $productos->whereRaw( "UPPER(CONCAT_WS( ' ' ,`code`, `title`, `subtitle`, `words`, `table`, `text`)) LIKE UPPER('%{$request->s}%')" );
        $data["view"] = "page.search";
        $data["total"] = $productos->count();
        $data["productos"] = $productos->orderBy("code")->paginate(18);
        $data["search"] = $request->s;
        $data["title"] = "Buscador";

        return view( 'layouts.main' ,compact( 'data' ) );
    }

    public function categoria($title, $id) {
        $data = self::datos("productos");
        $data["view"] = "page.categoria";
        $data["category_id"] = $id;
        $data["categoria"] = Category::find($id);
        $data["categorias"] = Category::where("elim", 0)->orderBy("order")->get();
        $productos = $data["categoria"]->productos()->where("elim", 0)->orderBy("code")->paginate(15);
        $data["productos"] = $productos;//->merge($productos);
        $data["title"] = "{$data["categoria"]->name}";

        return view( 'layouts.main' ,compact( 'data' ) );
    }

    public function producto($title, $id) {
        $data = self::datos("productos");
        $data["view"] = "page.producto";
        $data["producto"] = Product::find($id);
        $data["category_id"] = $data["producto"]->category_id;
        $data["category"] = $data["producto"]->category;
        $data["productos"] = $data["category"]->productos()->where("elim", 0)->where("id", "!=", $id)->orderByRaw('RAND()')->take(3)->get();
        $data["categorias"] = Category::where("elim", 0)->orderBy("order")->get();
        $data["title"] = $data["producto"]->title;
        $data['metadato']['keywords'] = $data["producto"]->words;
        return view( 'layouts.main' ,compact( 'data' ) );
    }

    public function blog($title, $id) {
        $data = self::datos( "novedades" );
        $data["elementos"] = [];
        $data[ "blog" ] = Blog::find( $id );
        $data[ "previous" ] = Blog::where( "id" , "<" , $id )->orderBy( "date" )->first();
        $data[ "next" ] = Blog::where( "id" , ">" , $id )->orderBy( "date" , "DESC" )->first();
        $data["elementos"][ "blog_categorias" ] = Blog_categorias::where("elim", 0)->get( );
        $data[ "view" ] = "page.blog";
        $data[ "title" ] = "Novedad - {$data["blog"]->title}";
        return view( 'layouts.main' ,compact( 'data' ) );
    }

    public function blog_category($slug_category , $id ) {
        $data = self::datos( "novedades" );
        $data["elementos"] = [];
        $data["category"] = Blog_categorias::find( $id );
        $data["elementos"][ "blog_categorias" ] = Blog_categorias::where("elim", 0)->get( );
        $data[ "view" ] = "page.blog_category";
        $data[ "blogs" ] = $data["category"]->blogs()->where("elim", 0)->orderBy( "date" , "DESC" )->simplePaginate( 8 );
        $data[ "title" ] = "Categoría - {$data["category"]->title}";
        return view( 'layouts.main' ,compact( 'data' ) );
    }
}
