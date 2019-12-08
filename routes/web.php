<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/autenticarse', 'Login@index')->name('autenticacion');
Route::get('/','Principal@index')->name('Principal');
Route::get('/condiciones-de-uso', "Principal@condiciones")->name('condiciones');
Route::get('/garantia-de-devolucion', "Principal@devoluciones")->name('devoluciones');
Route::get('/tarifas-de-envio', "Principal@envios")->name('tarifas-envios');
Route::get('/metodos-de-pago', "Principal@pagos")->name('metodos-pagos');
Route::get('/categoria/{slugSeccion}/', "Categorias@seccion")->name('seccion');
Route::get('/categoria/{slugSeccion}/pagina/{numeroPagina}/', "Categorias@seccionPagina")->name('seccionPagina');
Route::get('/categoria/{slugSeccion}/{slugSubseccion}/', "Categorias@subseccion")->name('subseccion');
Route::get('/categoria/{slugSeccion}/{slugSubseccion}/pagina/{numeroPagina}/', "Categorias@subseccionPagina")->name('subseccionPagina');
Route::get('/categoria/{slugSeccion}/{slugSubseccion}/{slugArticulo}/', "Articulos@articulo")->name('articulo');
Route::get('/panel-de-control/{idUsuario}/comentarios', "PaneldeControl@comentarios")->name('comentarios');
Route::get('/panel-de-control/{idUsuario}/wishlist', "PaneldeControl@wishlist")->name('wishlist');
Route::get('/panel-de-control/wishlist/guardar/{idArticulo}', "PaneldeControl@wishlistGuardar");
Route::post('/panel-de-control/comentario/guardar/{idArticulo}', "PaneldeControl@comentarioGuardar")->name('guardarComentario');
Route::get('/panel-de-control/wishlist/guardar/{idArticulo}', "PaneldeControl@wishlistGuardar")->name('agregarWhislist');
Route::get('/panel-de-control/pedido-articulo/guardar/{idArticulo}', "PaneldeControl@pedidoArticuloGuardar")->name('guardarArticulo');
Route::get('/buscar/articulo/{Articulo}', "Buscador@buscarArticulo")->name('buscarArticulo');
Route::get('/panel-de-control/{idUsuario}/pedidos/', "PaneldeControl@pedidos")->name('pedidos');
Route::get('/panel-de-control/pedido/realizado/{pedidoRealizado}', "PaneldeControl@pedidoRealizado")->name('pedidoRealizado');
Route::get('/panel-de-control/{idUsuario}/pedido/{idPedido}/', "PaneldeControl@pedido")->name('pedido');
Route::get('/panel-de-control/{idUsuario}/informacion/', "PaneldeControl@informacionUsuario")->name('informacion');
Route::get('/carrito/', "Carrito@mostrar")->name('carrito');
Route::get('/carrito/borrar/{idArticulo}/', "Carrito@borrar")->name('borrarArticulo');
Route::get('/carrito/vaciar/{idPedido}/', "Carrito@vaciar")->name('vaciarCarrito');
Route::get('/carrito/cambiar/{idArticulo}/{unidades}', "Carrito@cambiarUnidades")->name('cambiarUnidades');
Route::get('/panel-de-control/usuarios/', "PaneldeControl@usuarios")->name('usuarios');
Route::get('/panel-de-control/envios/', "PaneldeControl@envios")->name('envios');
Route::get('/panel-de-control/cobros/', "PaneldeControl@cobros")->name('cobros');
Route::get('/usuario/cambiarRol/{idUsuario}/{rol}/', "PaneldeControl@cambiarRol")->name('cambiarRol');
Route::get('/usuario/eliminar/{idUsuario}/', "PaneldeControl@eliminar")->name('eliminarUsuario');
Route::get('/envio/cambiar-empresa/{idEnvio}/{descripcionEmpresa}/', "PaneldeControl@envioCambiarEmpresa")->name('envioCambiarEmpresa');
Route::get('/envio/cambiar-estado/{idEnvio}/{descripcionEstado}/', "PaneldeControl@envioCambiarEstado")->name('envioCambiarEstado');
Route::get('/cobro/cambiar-empresa/{idCobro}/{descripcionEmpresa}/', "PaneldeControl@cobroCambiarEmpresa")->name('cobroCambiarEmpresa');
Route::get('/cobro/cambiar-estado/{idCobro}/{descripcionEstado}/', "PaneldeControl@cobroCambiarEstado")->name('cobroCambiarEstado');
Route::get('/carrito/finalizar-compra/', "Carrito@finalizarCompra")->name('finalizarCompra');
Route::post('/carrito/compra-realizada/', "Carrito@compraRealizada")->name('compraRealizada');







