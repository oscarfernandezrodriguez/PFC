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

    public function informacionUsuario($idUsuario)
    {
        if ((Auth::user()->id_usuario) != $idUsuario) {
            $idUsuario = Auth::user()->id_usuario;
        }
        $Secciones = \App\Seccion::all();
        return view("infoUsuario", compact('idUsuario', 'Secciones'));

    }

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
            $pedidosUsuario = \App\Pedido::where('usuario_id', $idUsuario)->where('estado_pedido_id', 1)->get('id_pedido');
            if ($pedidosUsuario->count() == 0) {
                $Pedido = new \App\Pedido();
                $Pedido->usuario_id = $idUsuario;
                $Pedido->estado_pedido_id = 1;
                $Pedido->save();
                $pedidosUsuario = \App\Pedido::where('usuario_id', $idUsuario)->where('estado_pedido_id', 1)->get('id_pedido');
            }
            if (\App\Pedido_articulo::where('articulo_id', $idArticulo)->where('pedido_id', $pedidosUsuario[0]->id_pedido)->count() == 0) {
                $pedidoArticuloUsuario = new \App\Pedido_articulo();
                $pedidoArticuloUsuario->usuario_id = $idUsuario;
                $pedidoArticuloUsuario->pedido_id = $pedidosUsuario[0]->id_pedido;
                $pedidoArticuloUsuario->articulo_id = $idArticulo;
                $pedidoArticuloUsuario->unidades_pedido = '1';
                $pedidoArticuloUsuario->save();
            } else {
                $cantidadArticulo = \App\Pedido_articulo::where('articulo_id', $idArticulo)->where('pedido_id', $pedidosUsuario[0]->id_pedido)->get('unidades_pedido');
                $cantidadArticulo[0]->unidades_pedido++;
                \App\Pedido_articulo::where('articulo_id', $idArticulo)->where('pedido_id', $pedidosUsuario[0]->id_pedido)->update(['unidades_pedido' => $cantidadArticulo[0]->unidades_pedido]);
            }

            $cantidadArticulo = \App\Articulo::where('id_articulo', $idArticulo)->get('unidades');
            if ($cantidadArticulo[0]->unidades != 0) {
                $cantidadArticulo[0]->unidades--;
                \App\Articulo::where('id_articulo', $idArticulo)->update(['unidades' => $cantidadArticulo[0]->unidades]);

                return Response()->json('save');
            } else {
                return Response()->json('fail');
            }

        } else {
            return Response()->json('nosave');
        }
    }

    public function pedidos($idUsuario)
    {
        if (Auth::check()) {

            if ((Auth::user()->id_usuario) != $idUsuario) {
                $idUsuario = Auth::user()->id_usuario;
            }

            $Secciones = \App\Seccion::all();
            $Pedidos = \App\Pedido::where('pedidos.usuario_id', $idUsuario)->get();

            return view("pedidos", compact('idUsuario', 'Pedidos', 'Secciones'));
        } else {
            return redirect()->route('Principal');
        }
    }

    public function pedidoRealizado($pedidoRealizado)
    {
        if (Auth::check()) {
            $idUsuario = Auth::user()->id_usuario;
            $Secciones = \App\Seccion::all();
            $Pedidos = \App\Pedido::where('pedidos.usuario_id', $idUsuario)->get();

            return view("pedidos", compact('idUsuario', 'Pedidos', 'Secciones', 'pedidoRealizado'));
        } else {
            return redirect()->route('Principal');
        }
    }

    public function pedido($idUsuario, $idPedido)
    {
        if (Auth::check()) {

            if ((Auth::user()->id_usuario) != $idUsuario) {
                $idUsuario = Auth::user()->id_usuario;
            }

            $Secciones = \App\Seccion::all();
            $Pedidos = \App\Pedido_articulo::where('pedido_id', $idPedido)->get('id_pedido_articulo')->toArray();
            $Articulos = \App\Articulo::join('pedidos_articulo', 'pedidos_articulo.articulo_id', '=', 'articulos.id_articulo')->whereIn('pedidos_articulo.id_pedido_articulo', $Pedidos)->get();

            return view("pedido", compact('idUsuario', 'idPedido', 'Articulos', 'Secciones'));
        } else {
            return redirect()->route('Principal');
        }


    }

    public function usuarios()
    {
        if (Auth::check()) {

            $idUsuario = Auth::user()->tipo_usuario_id;
            if ($idUsuario != 1) {
                return redirect()->route('Principal');
            } else {

                $Secciones = \App\Seccion::all();
                $usuarios = \App\Usuario::all();

                return view("usuarios", compact('Secciones', 'usuarios', 'idUsuario'));
            }
        } else {
            return redirect()->route('Principal');
        }
    }

    public function envios()
    {
        if (Auth::check()) {

            $idUsuario = Auth::user()->tipo_usuario_id;
            if ($idUsuario <= 3) {
                $Secciones = \App\Seccion::all();
                $Envios = \App\Envio::all();

                return view("envios", compact('Secciones', 'Envios'));

            } else {
                return redirect()->route('Principal');
            }
        } else {
            return redirect()->route('Principal');
        }
    }

    public function cobros()
    {
        if (Auth::check()) {

            $idUsuario = Auth::user()->tipo_usuario_id;
            if ($idUsuario <= 2 || $idUsuario == 4) {
                $Secciones = \App\Seccion::all();
                $Cobros = \App\Cobro::all();

                return view("cobros", compact('Secciones', 'Cobros'));

            } else {
                return redirect()->route('Principal');
            }
        } else {
            return redirect()->route('Principal');
        }
    }

    public function cambiarRol($idUsuario, $rol)
    {
        if (Auth::check()) {

            $idUsuarioA = Auth::user()->tipo_usuario_id;
            if ($idUsuarioA != 1) {
                return Response()->json('fail');
            } else {
                $rolC = \App\Tipo_Usuario::where('descripcion', $rol)->get('id_tipo_usuario')[0]->id_tipo_usuario;
                \App\Usuario::where('id_usuario', $idUsuario)->update(['tipo_usuario_id' => $rolC]);
                return Response()->json('save');
            }
        } else {
            return Response()->json('fail');
        }
    }

    public function eliminar($idUsuario)
    {
        if (Auth::check()) {

            $idUsuarioA = Auth::user()->tipo_usuario_id;
            if ($idUsuarioA != 1) {
                return Response()->json('fail');
            } else {
                \App\Usuario::where('id_usuario', $idUsuario)->delete();
                return Response()->json('delete');
            }
        } else {
            return Response()->json('fail');
        }
    }

    public function envioCambiarEmpresa($idEnvio, $descripcionEmpresa)
    {
        if (Auth::check()) {

            if (Auth::check()) {

                $idUsuarioA = Auth::user()->tipo_usuario_id;
                if ($idUsuarioA >= 3) {
                    return Response()->json('fail');
                } else {
                    $empresaNueva = \App\Empresa_transporte::where('nombre_empresa', $descripcionEmpresa)->get('id_empresa_transporte')[0]->id_empresa_transporte;
                    \App\Envio::where('id_envio', $idEnvio)->update(['empresa_transporte_id' => $empresaNueva]);
                    return Response()->json('save');
                }
            } else {
                return Response()->json('fail');
            }
        }
    }

    public function envioCambiarEstado($idEnvio, $descripcionEstado)
    {
        if (Auth::check()) {

            $idUsuarioA = Auth::user()->tipo_usuario_id;
            if ($idUsuarioA >= 3) {
                return Response()->json('fail');
            } else {
                $estadoNuevo = \App\Estado_envio::where('descripcion', $descripcionEstado)->get('id_estado_envio')[0]->id_estado_envio;
                \App\Envio::where('id_envio', $idEnvio)->update(['estado_envio_id' => $estadoNuevo]);
                return Response()->json('save');
            }
        } else {
            return Response()->json('fail');
        }
    }

    public function cobroCambiarEmpresa($idCobro, $descripcionEmpresa)
    {
        if (Auth::check()) {

            if (Auth::check()) {

                $idUsuarioA = Auth::user()->tipo_usuario_id;
                if ($idUsuarioA >= 3) {
                    return Response()->json('fail');
                } else {
                    $empresaNueva = \App\Empresa_cobro::where('nombre_empresa', $descripcionEmpresa)->get('id_empresa_cobro')[0]->id_empresa_cobro;
                    \App\Cobro::where('id_cobro', $idCobro)->update(['empresa_cobro_id' => $empresaNueva]);
                    return Response()->json('save');
                }
            } else {
                return Response()->json('fail');
            }
        }
    }

    public function cobroCambiarEstado($idCobro, $descripcionEstado)
    {
        if (Auth::check()) {

            $idUsuarioA = Auth::user()->tipo_usuario_id;
            if ($idUsuarioA >= 3) {
                return Response()->json('fail');
            } else {
                $estadoNuevo = \App\Estado_cobro::where('descripcion', $descripcionEstado)->get('id_estado_cobro')[0]->id_estado_cobro;
                \App\Cobro::where('id_cobro', $idCobro)->update(['estado_cobro_id' => $estadoNuevo]);
                return Response()->json('save');
            }
        } else {
            return Response()->json('fail');
        }
    }
}
