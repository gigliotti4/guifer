<?php

namespace App\Imports;

use App\Product;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ProductsImport implements ToModel, WithHeadingRow
{
    private $category = null;

    public function  __construct(Category $category)
    {
        $this->category = $category;
    }

    public function limpiar($n)
    {
        $value = trim($n);
        return $value === "" ? NULL : $value;
    }

    public function value($k) {
        return null;
    }

    public function transformTH($k) {
        return "<th>{$k}</th>";
    }

    public function transformTD($k) {
        return "<td>{$k}</td>";
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        foreach($row AS $k => $v) {
            $v = trim($v);
            $row[$k] = $v === "" ? NULL : $v;
        }
        $rules = [
            "codigo" => "required|max:10",
            "destacado" => "nullable|integer",
            "ficha" => "nullable|max:50",
            "plano" => "nullable|max:50",
            "titulo" => "nullable|max:200",
            "subtitulo" => "nullable",
            "descripcion" => "nullable",
            "palabras" => "nullable",
            "img1" => "nullable",
            "img2" => "nullable",
            "img3" => "nullable",
            "img4" => "nullable",
            "img5" => "nullable",
            "tabla" => "nullable",
            "filas" => "nullable|integer"
        ];
        $validator = Validator::make($row, $rules);
        if ($validator->fails())
            return null;
        $row["destacado"] = empty($row["destacado"]) ? 0 : $row["destacado"];
        $row["filas"] = empty($row["filas"]) ? 0 : $row["filas"];
        $key = (new Product)->getFillable();
        $value = array_map("self::value", $key);
        $datos = array_combine($key, $value);
        $datos["category_id"] = $this->category->id;
        $datos["code"] = isset($row["codigo"]) ? $row["codigo"] : null;
        $datos["is_destacado"] = $row["destacado"];
        $datos["ficha"] = isset($row["ficha"]) ? $row["ficha"] : null;
        $datos["plano"] = isset($row["plano"]) ? $row["plano"] : null;
        $datos["title"] = isset($row["titulo"]) ? $row["titulo"] : null;
        $datos["subtitle"] = isset($row["subtitulo"]) ? $row["subtitulo"] : null;
        $datos["text"] = isset($row["descripcion"]) ? $row["descripcion"] : null;
        $datos["words"] = isset($row["palabras"]) ? $row["palabras"] : null;
        $datos["images"] = [];
        $datos["table"] = null;
        $datos["elim"] = 0;
        if (!empty($row["tabla"]) && !empty($row["filas"])) {
            $thead = explode(";", $row["tabla"]);
            $thead = "<tr>" . implode(array_map("self::transformTH", $thead)) . "</tr>";
            $tbody = [];
            for ($i = 1; $i <= $row["filas"]; $i++) {
                if (!empty($row["fila{$i}"]))
                    $tbody[] = "<tr>" . implode(array_map("self::transformTD", explode(";", $row["fila{$i}"]))) . "</tr>";
            }
            $tbody = implode($tbody);
            $datos["table"] = "<table><thead>{$thead}</thead><tbody>{$tbody}</tbody></table>";
        }
        for ($i = 1; $i <= 5; $i++) {
            if (!empty($row["img{$i}"]))
                $datos["images"][] = $row["img{$i}"];
        }
        $producto = Product::where("code", $datos["code"])->first();
        if (empty($producto))
            $producto = Product::create($datos);
        else {
            $producto->fill($datos);
            $producto->save();
        }
        return $producto;
    }
}
