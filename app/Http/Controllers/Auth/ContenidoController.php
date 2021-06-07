<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contenido;
use App\Empresa;
use App\Slider;
class ContenidoController extends Controller
{
    public function edit($section) {
        $contenido = Contenido::where("section", $section)->first();
        if(empty($contenido))
            $contenido = Contenido::create(["section" => $section, "data" => []]);
        $data = [
            "view" => "auth.parts.contenido" . ucwords($section),
            "title" => "Contenido: " . strtoupper($section),
            "elementos" => $contenido,
            "section" => $section,
            "empresa" => Empresa::first()
        ];
        return view('auth.distribuidor', compact('data'));
    }

    public function update( Request $request , $section ) {
        $datosRequest = $request->all();
        try {
            $contenido = Contenido::where('section', $section)->first();
            $OBJ = (new AdmController)->object($request, $contenido["data"]);
            $contenido->fill(["data" => $OBJ]);
            $contenido->save();
        } catch (\Throwable $th) {
            return json_encode(["error" => 1]);
        }
        return json_encode(['success' => true, "error" => 0]);
    }
}
