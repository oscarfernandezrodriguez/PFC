<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;

class PaneldeControl extends Controller
{
    public function comentarios($idUsuario){
        $Articulos=Articulo::inRandomOrder()->get();
        $Secciones=\App\Seccion::all();
        $comentariosUsuario=\App\Comentario::where('usuario_id',$idUsuario)->get();
        $idcomentariosUsuario=\App\Comentario::where('usuario_id',$idUsuario)->get('articulo_id')->toArray();
        $articuloComentario=Articulo::whereIn('id_articulo',$idcomentariosUsuario)->get();
        return view("comentario", compact('idUsuario','Articulos','Secciones','comentariosUsuario','articuloComentario'));
    }
}
