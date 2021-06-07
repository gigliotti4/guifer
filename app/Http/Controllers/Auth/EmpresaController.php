<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresa;
use App\Contenido;
class EmpresaController extends Controller
{
    public function value($k) {
        return null;
    }
    public function datos()
    {
        $datos = Empresa::first();
        if (!$datos) {
            $key = (new Empresa)->getFillable();
            $value = array_map("self::value", $key);
            $datos = Empresa::create(array_combine($key, $value));
        }
        $data = [
            "title" => "Empresa :: Datos generales",
            "view" => "auth.parts.empresa",
            "seccion" => "empresa",
            "elementos" => $datos
        ];
        return view('auth.distribuidor',compact('data'));
    }

    public function newsletter(Request $request) {
        $elements = new \App\Newsletter;
        if (isset($request->search))
            $elements = $elements->where( "UPPER(CONCAT_WS( ' ' ,`mail`)) LIKE UPPER('%{$request->search}%')" );
        $elements = $elements->orderBy('mail')->paginate(15);
        $data = [
            "view"      => "auth.parts.newsletter",
            "title"     => "Newsletter",
            "elementos"   => $elements,
            "buttons" => [
                [ "i" => "fas fa-trash-alt" , "b" => "btn-danger" , "t" => "Eliminar" ]
            ],
        ];
        if (isset($request->search))
            $data["search"] = $request->search;
        return view('auth.distribuidor',compact('data'));
    }
    public function newsletterDestroy( Request $request )
    {
        $elements = new \App\Newsletter;
        return (new AdmController)->delete($elements->find($request->all()["id"]), $elements->getFillable());
    }

    public function form(Request $request)
    {
        $dataRequest = $request->all();
        $datos = Empresa::first();
        if(empty($dataRequest)) {
            $data = [
                "title"     => "Empresa :: Email de formularios",
                "view"      => "auth.parts.empresaForm",
                "seccion"   => "form",
                "elementos" => $datos
            ];
            return view('auth.distribuidor',compact('data'));
        }
        try {
            unset($dataRequest["_token"]);
            $datos->fill(["form" => $dataRequest]);
            $datos->save();
        } catch (\Throwable $th) {
            return json_encode(["error" => 1]);
        }
        return json_encode(['success' => true, "error" => 0]);
    }
    public function update(Request $request)
    {
        $data = Empresa::first();
        try {
            $OBJ = (new AdmController)->object( $request , $data );
            $data->fill($OBJ);
            $data->save();
        } catch (\Throwable $th) {
            return json_encode(["error" => 1]);
        }
        return json_encode(['success' => true, "error" => 0]);
    }

    public function url(Request $request) {
        if (empty($request->all())) {
            $datos = Empresa::first()->sections;
            $data = [
                "title"     => "Empresa :: Secciones",
                "view"      => "auth.parts.empresaSecciones",
                "elementos" => $datos,
                "buttons" => []
            ];
            return view('auth.distribuidor',compact('data'));
        } else {
            $data = $request->all();
            $datos = Empresa::first();
            $Arr = [];
            for ($i = 0; $i < count($data["LINK"]); $i++) {
                $aux = ["LINK" => null, "NAME" => null, "SHOW" => null, "REQUEST" => null, "FUNCTION" => null];
                $aux["LINK"] = $data["LINK"][$i];
                $aux["NAME"] = $data["NAME"][$i];
                $aux["REQUEST"] = $data["REQUEST"][$i];
                $aux["SHOW"] = $data["SHOW"][$i];
                $aux["FUNCTION"] = $data["FUNCTION"][$i];
                $Arr[] = $aux;
            }
            $datos->fill(["sections" => $Arr]);
            $datos->save();
            return back();
        }
    }
    /**
     * Redes sociales
     */
    public function redes() {
        $datos = Empresa::first()["redes"];

        $data = [
            "title"     => "Empresa :: Redes sociales",
            "view"      => "auth.parts.empresaRedes",
            "elementos" => $datos,
            "buttons" => [
                [ "i" => "fas fa-pencil-alt" , "b" => "btn-warning" , "t" => "Editar" ],
                [ "i" => "fas fa-trash-alt" , "b" => "btn-danger" , "t" => "Eliminar" ]
            ],
        ];
        return view('auth.distribuidor',compact('data'));
    }
    public function redesStore(Request $request, $id = null) {
        $datos = Empresa::first();
        try {
            $redes = $datos[ "redes" ];
            if( is_null( $id ) )
                $id = time();
            if( empty( $redes ) )
                $redes = [];
            else {
                if( !isset( $redes[ $id ] ) )
                    $redes[ $id ] = [];
            }
            $OBJ = (new AdmController)->object( $request );
            $redes[ $id ] = $OBJ;
            $datos->fill([ "redes" => $redes ] );
            $datos->save();
        } catch (\Throwable $th) {
            return json_encode(["error" => 1]);
        }
        return json_encode(['success' => true, "error" => 0]);
    }
    public function redesDestroy( Request $request )
    {
        try {
            $data = Empresa::first();
            $redes = $data->redes;
            unset( $redes[ $request->all()[ "id" ] ] );

            $data->fill( [ "redes" => $redes ] );
            $data->save();
        } catch (\Throwable $th) {
            return json_encode(["error" => 1]);
        }
        return json_encode(['success' => true, "error" => 0]);
    }
    public function redesEdit($id)
    {
        return Empresa::first()->redes[ $id ];
    }
    public function redesUpdate(Request $request, $id) {
        return self::redesStore($request,$id);
    }
    public function terminos(Request $request) {
        $contenido = Contenido::where("section", "terminos")->first();
        if (empty($contenido))
            $contenido = Contenido::create(["section" => "terminos", "data" => ["titulo" => null, "texto" => null]]);
        $data = [
            "title"     => "Contenido: TÉRMINOS Y CONDICIONES",
            "view"      => "auth.parts.contenidoTerminos",
            "section"   => "terminos",
            "elementos" => $contenido
        ];
        return view( 'auth.distribuidor' , compact( 'data' ) );
    }
}
