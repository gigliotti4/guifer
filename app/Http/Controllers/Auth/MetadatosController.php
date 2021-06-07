<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresa;
class MetadatosController extends Controller
{
    public function index()
    {
        $title = "Empresa :: Metadatos";
        $seccion = "metadatos";
        $datos = Empresa::first();
        if(empty($datos["metadata"])) {
            $aux = ["description" => null, "keywords" => null];
            $ARR = [];
            $ARR["home"] = $aux;
            $ARR["empresa"] = $aux;
            $ARR["productos"] = $aux;
            $ARR["novedades"] = $aux;
            $ARR["clientes"] = $aux;
            $ARR["servicios"] = $aux;
            $ARR["presupuesto"] = $aux;
            $ARR["contacto"] = $aux;
            $datos->fill(["metadata" => $ARR]);
            $datos = $datos->save();
        }
        $data = [
            "title"     => "Empresa :: Metadatos",
            "view"      => "auth.parts.empresaMetadatos",
            "elementos" => $datos->metadata,
            "buttons" => [
                [ "i" => "fas fa-pencil-alt" , "b" => "btn-warning" , "t" => "Editar" ]
            ],
        ];
        return view('auth.distribuidor',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $seccion = null, $data = null)
    {
        try {
            $metadata = $data->metadata;
            $metadata[ $seccion ] = (new AdmController)->object( $request , $metadata[ $seccion ] );
            $data->fill( [ "metadata" => $metadata ] );
            $data->save();
        } catch (\Throwable $th) {
            return json_encode(["error" => 1]);
        }
        return json_encode(['success' => true, "error" => 0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $seccion)
    {
        $metadatos = Empresa::first();
        return self::store($request,$seccion,$metadatos);
    }
}
