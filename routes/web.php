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
Route::get('/',['as'=>'Principal','uses'=>'Principal@index']);
Route::get('/condiciones-de-uso', "Principal@condiciones");
Route::get('/garantia-de-devolucion', "Principal@devoluciones");
Route::get('/tarifas-de-envio', "Principal@envios");
Route::get('/metodos-de-pago', "Principal@pagos");
Route::get('/categoria/{slugSeccion}/', "Categorias@seccion");
Route::get('/categoria/{slugSeccion}/pagina/{numeroPagina}/', "Categorias@seccionPagina");
Route::get('/categoria/{slugSeccion}/{slugSubseccion}/', "Categorias@subseccion");
Route::get('/categoria/{slugSeccion}/{slugSubseccion}/pagina/{numeroPagina}/', "Categorias@subseccionPagina");
Route::get('/categoria/{slugSeccion}/{slugSubseccion}/{slugArticulo}/', "Articulos@articulo");
Route::get('/panel-de-control/{idUsuario}/comentarios', "PaneldeControl@comentarios");
Route::get('/panel-de-control/{idUsuario}/wishlist', "PaneldeControl@wishlist");
Route::get('/panel-de-control/wishlist/guardar/{idArticulo}', "PaneldeControl@wishlistGuardar");
Route::post('/panel-de-control/comentario/guardar/{idArticulo}', "PaneldeControl@comentarioGuardar")->name('guardarComentario');
Route::get('/panel-de-control/wishlist/guardar/{idArticulo}', "PaneldeControl@wishlistGuardar")->name('agregarWhislist');
Route::get('/panel-de-control/pedido-articulo/guardar/{idArticulo}', "PaneldeControl@pedidoArticuloGuardar");





