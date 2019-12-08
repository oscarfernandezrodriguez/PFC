<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Buscador extends Controller
{
    public function buscarArticulo($Articulo)
    {
        $resultado = \App\Articulo::where(strtolower('titulo'), 'LIKE', strtolower('%' . $Articulo . '%'))->join('secciones', 'secciones.id_seccion', '=', 'articulos.seccion_id')->join('subsecciones', 'subsecciones.id_subseccion', '=', 'articulos.subseccion_id')->take(5)->get();
        $resultadoContador = \App\Articulo::where(strtolower('titulo'), 'LIKE', strtolower('%' . $Articulo . '%'))->get()->count();
        if ($resultadoContador == 0) {
            $resultado = null;
            return $resultado;
        } else {
            return $resultado;
        }

    }
}
