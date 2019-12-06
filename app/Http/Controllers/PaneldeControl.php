<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Response;

class PaneldeControl extends Controller
{
    public function comentarios($idUsuario)
    {
        if ((Auth::user()->id_usuario) != $idUsuario) {
            $idUsuario = Auth::user()->id_usuario;
        }
        $Articulos = Articulo::inRandomOrder()->get();
        $Secciones = \App\Seccion::all();
        $comentariosUsuario = \App\Comentario::where('usuario_id', $idUsuario)->get();
        $idcomentariosUsuario = \App\Comentario::where('usuario_id', $idUsuario)->get('articulo_id')->toArray();
        $articuloComentario = Articulo::whereIn('id_articulo', $idcomentariosUsuario)->get();

        return view("comentario", compact('idUsuario', 'Articulos', 'Secciones', 'comentariosUsuario', 'articuloComentario'));

    }

    public function wishlist($idUsuario)
    {
        if (Auth::check()) {

            if ((Auth::user()->id_usuario) != $idUsuario) {
                $idUsuario = Auth::user()->id_usuario;
            }
            $Articulos = Articulo::inRandomOrder()->get();
            $Secciones = \App\Seccion::all();
            $wishlistsUsuario = \App\Wishlist::where('usuario_id', $idUsuario)->get();
            $idwishlistsUsuario = \App\Wishlist::where('usuario_id', $idUsuario)->get('articulo_id')->toArray();
            $articuloWishlist = Articulo::whereIn('id_articulo', $idwishlistsUsuario)->get();

            return view("wishlist", compact('idUsuario', 'Articulos', 'Secciones', 'wishlistsUsuario', 'articuloWishlist'));
        } else {
            return redirect()->route('Principal');
        }

    }

    public function wishlistGuardar($idArticulo)
    {
        if (Auth::check()) {
            $idUsuario = Auth::user()->id_usuario;
            $existeWish = \App\Wishlist::where('articulo_id', $idArticulo)->where('usuario_id', $idUsuario)->whereNull('deleted_at')->count();
            if ($existeWish > 0) {
                $existeWish = \App\Wishlist::where('articulo_id', $idArticulo)->where('usuario_id', $idUsuario)->whereNull('deleted_at')->get('id_wishlist');
                \App\Wishlist::find($existeWish[0]->id_wishlist)->delete();
                return Response()->json('delete');
            } else {
                $wishlist = new \App\Wishlist();
                $wishlist->usuario_id = Auth::user()->id_usuario;;
                $wishlist->articulo_id = $idArticulo;
                $wishlist->save();
                return Response()->json('save');
            }
        }
        return Response()->json('fail');

    }

    public function comentarioGuardar(Request $request, $idArticulo)
    {
        if (Auth::check()) {
            $idUsuario = Auth::user()->id_usuario;
            $existeComentario = \App\Comentario::where('articulo_id', $idArticulo)->where('usuario_id', $idUsuario)->whereNull('deleted_at')->count();
            if ($existeComentario > 0) {
                return back()->with('mensaje', 'existe');
            } else {
                $comentario = new \App\Comentario();
                $comentario->usuario_id = Auth::user()->id_usuario;;
                $comentario->articulo_id = $idArticulo;
                $comentario->titulo = $request->input('tituloComentario');
                $comentario->contenido = $request->input('tituloComentario');
                $comentario->save();
                return back()->with('mensaje', 'creado');
            }
        }
        return redirect()->route('Principal');
    }

    public function pedidoArticuloGuardar($idArticulo)
    {
        if (Auth::check()) {
                $idUsuario = Auth::user()->id_usuario;


            /*if (\App\Pedido::where('usuario_id', $idUsuario)->where('estado_pedido_id', 1)->count() == 1) {
                $pedido = new \App\Pedido();
                $pedido->usuario_id = $idUsuario;
                $pedido->estado_pedido_id = 1;
                $pedido - save();
                /*$pedido_articulo= new \App\Pedido_articulo();
                $pedido_articulo->usuario_id=$idUsuario;
                $pedido_articulo->articulo_id=$idArticulo;
                $unidadesTotales=\App\Articulo::where('id_articulo',$idArticulo)->get('unidades');
                $pedido_articulo->unidades=1;

            } else {

            }
            /*$existeWish=\App\Wishlist::where('articulo_id',$idArticulo)->where('usuario_id',$idUsuario)->whereNull('deleted_at')->count();
            if($existeWish>0){
                $existeWish=\App\Wishlist::where('articulo_id',$idArticulo)->where('usuario_id',$idUsuario)->whereNull('deleted_at')->get('id_wishlist');
                \App\Wishlist::find($existeWish[0]->id_wishlist)->delete();
                return Response()->json('delete');
            }else {
                $wishlist = new \App\Wishlist();
                $wishlist->usuario_id = Auth::user()->id_usuario;;
                $wishlist->articulo_id = $idArticulo;
                $wishlist->save();*/
            return Response()->json('save');
            /*    }
            }
            return Response()->json('fail');*/
        }
    }
}
