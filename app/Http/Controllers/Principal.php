<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Articulo;
use App\Seccion;

class Principal extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return index view
     */
    public function index()
    {
        $Articulos=Articulo::inRandomOrder()->get();
        $maxArticulos=Articulo::all()->count();
        $Secciones=\App\Seccion::all();
        $minimo=0;
        $maximo=23;
        $pagina="de Inicio de la Farmacia";
        $numeroPagina=0;

        return view("index", compact('Articulos','maxArticulos','Secciones','maximo','minimo','numeroPagina','pagina'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return condiciones view
     */
    public function condiciones()
    {
        $Secciones=Seccion::all();
        return view("informacion/condiciones", compact('Secciones'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return devoluciones view
     */
    public function devoluciones()
    {
        $Secciones=Seccion::all();
        return view("informacion/devoluciones", compact('Secciones'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return envios view
     */
    public function envios()
    {
        $Secciones=Seccion::all();
        return view("informacion/envios", compact('Secciones'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return pagos view
     */
    public function pagos()
    {
        $Secciones=Seccion::all();
        return view("informacion/pagos", compact('Secciones'));
    }
}
