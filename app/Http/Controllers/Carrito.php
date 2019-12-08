<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;


class Carrito extends Controller
{

    public function mostrar()
    {
        if (Auth::check()) {

            $idUsuario = Auth::user()->id_usuario;

            $idPedido = \App\Pedido::where('usuario_id', $idUsuario)->where('estado_pedido_id', '1')->get('id_pedido');
            $Secciones = \App\Seccion::all();
            if(sizeof($idPedido)==1){
                $sinPedido=0;
                $Pedidos = \App\Pedido_articulo::where('pedido_id', $idPedido[0]->id_pedido)->get('id_pedido_articulo')->toArray();
                $Articulos = \App\Articulo::join('pedidos_articulo', 'pedidos_articulo.articulo_id', '=', 'articulos.id_articulo')->whereIn('pedidos_articulo.id_pedido_articulo', $Pedidos)->get();
                return view("carrito", compact('idUsuario', 'idPedido', 'Articulos', 'Secciones','sinPedido'));
            }else{
                $sinPedido=1;
                return view("carrito", compact('idUsuario', 'idPedido', 'Secciones','sinPedido'));
            }


        } else {
            return redirect()->route('Principal');
        }
    }

    public function borrar($idArticulo)
    {
        if (Auth::check()) {

            $idUsuario = Auth::user()->id_usuario;
            $idPedido = \App\Pedido::where('usuario_id', $idUsuario)->where('estado_pedido_id', '1')->get('id_pedido');
            $unidadesPedido = \App\Pedido_articulo::where('pedido_id', $idPedido[0]->id_pedido)->where('articulo_id', $idArticulo)->get('unidades_pedido');
            $PedidoArticulo = \App\Pedido_articulo::where('pedido_id', $idPedido[0]->id_pedido)->where('articulo_id', $idArticulo)->get();
            $numArticulos = \App\Articulo::where('id_articulo', $PedidoArticulo[0]->articulo_id)->get('unidades');
            $total = $numArticulos[0]->unidades;
            $total += $unidadesPedido[0]->unidades_pedido;
            \App\Articulo::where('id_articulo', $idArticulo)->update(['unidades' => $total]);
            \App\Pedido_articulo::where('id_pedido_articulo', $PedidoArticulo[0]->id_pedido_articulo)->delete();

            return Response()->json('nosave');
        } else {
            return Response()->json('fail');
        }
    }

    public function vaciar($idPedido)
    {
        if (Auth::check()) {

            $idUsuario = Auth::user()->id_usuario;
            $pedidosArticulo=\App\Pedido_articulo::where('pedido_id', $idPedido)->get();
            foreach ($pedidosArticulo as $pedidoArticulo) {
                $unidadesPedido = \App\Pedido_articulo::where('pedido_id', $pedidoArticulo->pedido_id)->where('articulo_id', $pedidoArticulo->articulo_id)->get();
                $PedidoArticulo = \App\Pedido_articulo::where('pedido_id', $pedidoArticulo->pedido_id)->where('articulo_id', $pedidoArticulo->articulo_id)->get();
                $numArticulos = \App\Articulo::where('id_articulo', $pedidoArticulo->articulo_id)->get('unidades');
                $total = $numArticulos[0]->unidades;
                $total += $unidadesPedido[0]->unidades_pedido;
                \App\Articulo::where('id_articulo', $pedidoArticulo->articulo_id)->update(['unidades' => $total]);
                \App\Pedido_articulo::where('id_pedido_articulo', $pedidoArticulo->id_pedido_articulo)->delete();
            }

            return Response()->json('nosave');
        } else {
            return Response()->json('fail');
        }
    }
    public function cambiarUnidades($idArticulo,$unidades)
    {
        if (Auth::check()) {

            $idUsuario = Auth::user()->id_usuario;
            $idPedido = \App\Pedido::where('usuario_id', $idUsuario)->where('estado_pedido_id', '1')->get('id_pedido');
            $numpedido=\App\Articulo::where('id_articulo',$idArticulo)->get('unidades')[0]->unidades;

            $unidadesfinales=$numpedido-$unidades;
            if($unidadesfinales<0){
                return Response()->json('fail');
            }else{
            \App\Articulo::where('id_articulo', $idArticulo)->update(['unidades' => $unidadesfinales]);
                \App\Pedido_articulo::where('pedido_id', $idPedido[0]->id_pedido)->where('usuario_id', $idUsuario)->where('articulo_id',$idArticulo)->update(['unidades_pedido' =>$unidades]);


            return Response()->json('save');
            }
        } else {
            return Response()->json('fail');
        }
    }
    public function finalizarCompra()
    {
        if (Auth::check()) {

            $idUsuario = Auth::user()->id_usuario;

            $idPedido = \App\Pedido::where('usuario_id', $idUsuario)->where('estado_pedido_id', '1')->get('id_pedido');
            $Secciones = \App\Seccion::all();
            if (sizeof($idPedido) == 1) {
                $sinPedido = 0;
                $Pedidos = \App\Pedido_articulo::where('pedido_id', $idPedido[0]->id_pedido)->get('id_pedido_articulo')->toArray();
                $Articulos = \App\Articulo::join('pedidos_articulo', 'pedidos_articulo.articulo_id', '=', 'articulos.id_articulo')->whereIn('pedidos_articulo.id_pedido_articulo', $Pedidos)->get();
                return view("finalizar", compact('idUsuario', 'idPedido', 'Articulos', 'Secciones', 'sinPedido'));
            } else {
                $sinPedido = 1;
                return view("finalizar", compact('idUsuario', 'idPedido', 'Secciones', 'sinPedido'));
            }


        } else {
            return redirect()->route('Principal');
        }
    }

    public function compraRealizada(Request $datosCompra)
    {

        $validacion=$datosCompra->validate([

            'tarjeta' => 'numeric',
            'mes' => 'required|numeric|between:1,12',
            'ano'    => 'required|numeric|between:19,39',
            'cvv' => 'required|numeric|between:1,999',
            'titular' => 'required|string',
        ]);
$datoscompra=$datosCompra->all();

        $idUsuario = Auth::user()->id_usuario;
        $idPedido = \App\Pedido::where('usuario_id', $idUsuario)->where('estado_pedido_id', '1')->get('id_pedido');
            $tarjeta= new \App\Tarjeta();
            $tarjeta->usuario_id=$idUsuario;
            $tarjeta->numero_tarjeta=$datosCompra->tarjeta;
            $tarjeta->mes=$datosCompra->mes;
        $empresa=\App\Empresa_cobro::all();
        $empresa=$empresa->where('nombre_empresa',$datosCompra->cobro);
        $tarjeta->ano=$datosCompra->ano;
        $tarjeta->cvv2=$datosCompra->cvv;
        $tarjeta->activo=1;
        $tarjeta->save();
        $cobro= new \App\Cobro();
        $cobro->pedido_id=$idPedido[0]->id_pedido;
        $cobro->empresa_cobro_id=$empresa;
        $cobro->tipo_cobro_id=\App\Tipos_Cobro::where('descripcion',$datosCompra->tipocobro)->get('id_tipo_cobro')[0]->id_tipo_cobro;
        $cobro->estado_cobro_id=1;
       // $cobro->save();
        $envio= new \App\Envio();
        $envio->pedido_id=$idPedido[0]->id_pedido;
        $envio->empresa_transporte_id=\App\Empresa_transporte::where('nombre_empresa',$datosCompra->envio)->get('id_empresa_transporte')[0]->id_empresa_transporte;
        $envio->estado_envio_id=1;
        $envio->tipo_transporte_id=\App\Tipos_Transporte::where('descripcion',$datosCompra->tipoenvio)->get('id_tipo_transporte')[0]->id_tipo_transporte;
        $envio->save();
        \App\Pedido::where('id_pedido',$idPedido[0]->id_pedido)->update(['estado_pedido_id'=>'2']);
        $pedidoRealizado=$idPedido[0]->id_pedido;
        return redirect()->route('pedidoRealizado',compact('pedidoRealizado'));
    }


}
