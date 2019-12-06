<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Principal;
use Illuminate\Http\Request;
use App\Articulo as Articulo;
use App\Seccion as Seccion;
use App\Subseccion as Subseccion;


class Categorias extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return seccion view
     */
    public function seccion($slugSeccion)
    {
        $Secciones = Seccion::all();
        $seccion = Seccion::where('slug', 'LIKE', $slugSeccion)->get('id_seccion');
        $seccionDescripcion = Seccion::where('slug', 'LIKE', $slugSeccion)->get('descripcion');
        $Articulos = Articulo::where('seccion_id', $seccion[0]['id_seccion'])->where('unidades','>',0)->get();
        $maxArticulos = Articulo::where('seccion_id', $seccion[0]['id_seccion'])->count();
        $pagina = "Principal";
        $numeroPagina=0;
        $minimo = 0;
        $maximo = 23;
        if ($maximo >= $maxArticulos) {
            $maximo = $maxArticulos - 1;
            $minimo = $maximo+1 - ($maxArticulos  % 24);
        }
        return view("index", compact('slugSeccion', 'Articulos', 'Secciones', 'seccionDescripcion', 'numeroPagina','pagina', 'maximo', 'minimo','maxArticulos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return seccionPagina view
     */
    public function seccionPagina($slugSeccion, $numeroPagina)
    {

        $Secciones = Seccion::all();
        $seccion = Seccion::where('slug', 'LIKE', $slugSeccion)->get('id_seccion');
        $seccionDescripcion = Seccion::where('slug', 'LIKE', $slugSeccion)->get('descripcion');
        $Articulos = Articulo::where('seccion_id', $seccion[0]['id_seccion'])->where('unidades','>',0)->get();
        $maxArticulos = Articulo::where('seccion_id', $seccion[0]['id_seccion'])->where('unidades','>',0)->count();
        if ($numeroPagina > 0) {
            $minimo = (24 * $numeroPagina) - 24;
            $maximo = (24 * $numeroPagina) - 1;
            if ($maximo >= $maxArticulos) {
                $maximo = $maxArticulos - 1;
                $minimo = $maximo+1 - ($maxArticulos  % 24);
            }
            if ($numeroPagina == 1) {
                $pagina = "Principal";
                $numeroPagina=0;;
            } else {
                $pagina = "nº " . $numeroPagina;
                $numeroPagina;
            }
        } else {
            $pagina = "Principal";
            $numeroPagina=0;
            $minimo = 0;
            $maximo = 23;
        }
        return view("index", compact('slugSeccion', 'Articulos', 'Secciones', 'seccionDescripcion', 'numeroPagina','pagina', 'maximo', 'minimo','maxArticulos'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return subseccion view
     */
    public function subseccion($slugSeccion, $slugSubseccion)
    {
        $Secciones = Seccion::all();
        $seccion = Seccion::where('slug', 'LIKE', $slugSeccion)->get('id_seccion');
        $seccionDescripcion = Seccion::where('slug', 'LIKE', $slugSeccion)->get('descripcion');
        $subseccion = Subseccion::where('slug', 'LIKE', $slugSubseccion)->get('id_subseccion');
        $subseccionDescripcion = Subseccion::where('slug', 'LIKE', $slugSubseccion)->get('descripcion');
        $Articulos = Articulo::where('seccion_id', $seccion[0]['id_seccion'])->where('subseccion_id', $subseccion[0]['id_subseccion'])->where('unidades','>',0)->get();
        $maxArticulos = Articulo::where('seccion_id', $seccion[0]['id_seccion'])->where('subseccion_id', $subseccion[0]['id_subseccion'])->where('unidades','>',0)->count();
        $pagina = "Principal";
        $numeroPagina=0;
        $minimo = 0;
        $maximo = 23;
        if ($maximo >= $maxArticulos) {
            $maximo = $maxArticulos - 1;
            $minimo = $maximo+1 - ($maxArticulos  % 24);
        }
        return view("index", compact('slugSeccion', 'slugSubseccion', 'Articulos', 'Secciones', 'seccionDescripcion', 'subseccionDescripcion', 'numeroPagina','pagina', 'maximo', 'minimo','maxArticulos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return seccionPagina view
     */
    public function subseccionPagina($slugSeccion, $slugSubseccion, $numeroPagina)
    {

        $Secciones = Seccion::all();
        $seccion = Seccion::where('slug', 'LIKE', $slugSeccion)->get('id_seccion');
        $seccionDescripcion = Seccion::where('slug', 'LIKE', $slugSeccion)->get('descripcion');
        $subseccion = Subseccion::where('slug', 'LIKE', $slugSubseccion)->get('id_subseccion');
        $subseccionDescripcion = Subseccion::where('slug', 'LIKE', $slugSubseccion)->get('descripcion');
        $Articulos = Articulo::where('seccion_id', $seccion[0]['id_seccion'])->where('subseccion_id', $subseccion[0]['id_subseccion'])->where('unidades','>',0)->get();
        $maxArticulos = Articulo::where('seccion_id', $seccion[0]['id_seccion'])->where('subseccion_id', $subseccion[0]['id_subseccion'])->where('unidades','>',0)->count();
        if ($numeroPagina > 0) {

            $minimo = (24 * $numeroPagina) - 24;
            $maximo = (24 * $numeroPagina) - 1;
            if ($maximo >= $maxArticulos) {
                $maximo = $maxArticulos - 1;
                $minimo = $maximo+1 - ($maxArticulos  % 24);
            }
            if ($numeroPagina <= 1) {
                $pagina = "Principal";
                $numeroPagina=0;
            } else {
                $pagina = "nº " . (round(($maxArticulos / 24))+1);
                $numeroPagina=(round(($maxArticulos / 24))+1);
            }
        } else {
            $pagina = "Principal";
            $numeroPagina=0;
            $minimo = 0;
            $maximo = 23;
        }
        return view("index", compact('slugSeccion','slugSubseccion', 'Articulos', 'Secciones', 'seccionDescripcion', 'subseccionDescripcion', 'numeroPagina','pagina', 'maximo', 'minimo','maxArticulos'));

    }
}
