<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Seccion;
use App\Subseccion;

class Articulos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return articulo view
     */
    public function articulo($slugSeccion, $slugSubseccion, $slugArticulo)
    {
        $Secciones = Seccion::all();
        $seccion = Seccion::where('slug', 'LIKE', $slugSeccion)->get('id_seccion');
        $subseccion = Subseccion::where('slug', 'LIKE', $slugSubseccion)->get('id_subseccion');
        $Articulo = \App\Articulo::where('articulos.slug', '=', $slugArticulo)->get();
        if (sizeof($Articulo) > 0) {
            return view("articulo", compact('slugSeccion', 'slugSubseccion', 'Articulo', 'Secciones'));
        } else {
            return redirect()->route('Principal');
        }
    }
}

