<div id="productoTitulo">
    <h1 id="cabeceraInfo">{{$Articulo[0]->titulo}}</h1>
</div>
<div id="infoProducto" class="col-12">
    <div id="productoImagen" class="col-12 col-sm-8">
        <img id="imagenProducto" src="{{ asset('images/imagen_articulo/'.$Articulo[0]->imagen_articulo_id.'.jpg') }}">
    </div>
    <div id="datosProducto" class="col-12 col-sm-4">
        <h4>Datos del producto</h4>
        <h5><i class="fas fa-box" id="cajaEnvio"></i> Unidades en stock: <b>{{$Articulo[0]->unidades}}</b></h5>
        <h5><i class="far fa-calendar-alt" id="calendario"></i> Fecha de venta:
            <b>{{date('d-m-Y',strtotime($Articulo[0]->created_at))}}</b></h5>
        <h5><i class="fas fa-money-bill-wave" id="dolarProducto"></i> Precio: <b>{{$Articulo[0]->precio}} €</b></h5>
        <h4>Datos de la categoria</h4>
        @php
            $Seccion=\App\Seccion::where('id_seccion',$Articulo[0]->seccion_id)->get();
            $Subseccion=\App\Subseccion::where('id_subseccion',$Articulo[0]->subseccion_id)->get();
        @endphp
        <h5><i class="fas fa-tag" id="tag"></i> Seccion: <b>{{$Seccion[0]->descripcion}}</b></h5>
        <h5><i class="fas fa-tags" id="tags"></i> Subseccion: <b>{{$Subseccion[0]->descripcion}}</b></h5>
        <div id="controladorCompra">
            <div id="loQuiero">
                <i class="fas fa-heart"></i><h4>Lo quiero!</h4>
            </div>
            <div id="loCompro">
                <i class="fas fa-shopping-basket"></i><h4>Añadir al carrito</h4>
            </div>
        </div>
    </div>
</div>

<div id="descripcionProducto">
    <h3>Descripcion:</h3>
    <p>{{$Articulo[0]->contenido}}</p>
</div>
<div id="otrosProductos">
    <hr>
    <h3>Otros productos:</h3>
    @php
        $Articulos=\App\Articulo::inRandomOrder()->where('subseccion_id',$Articulo[0]->subseccion_id)->get();
       $maxArticulos=\App\Articulo::inRandomOrder()->where('subseccion_id',$Articulo[0]->subseccion_id)->count();
       if($maxArticulos<3){
           $maximo=$maxArticulos;
       }else{
           $maximo=3;
       }
    @endphp
    @for ($numeroArticulo = 0; $numeroArticulo <= $maximo; $numeroArticulo++)
        @php
            $slugCategoria=\App\Seccion::select('secciones.slug')->join('articulos','articulos.seccion_id','=','secciones.id_seccion')->where('articulos.id_articulo','=',$Articulos[$numeroArticulo]->id_articulo)->get();
            $slugSubcategoria=\App\Subseccion::select('subsecciones.slug')->join('articulos','articulos.subseccion_id','=','subsecciones.id_subseccion')->where('articulos.id_articulo','=',$Articulos[$numeroArticulo]->id_articulo)->get();
            $slugArticulo=\App\Articulo::select('articulos.slug')->where('articulos.id_articulo','=',$Articulos[$numeroArticulo]->id_articulo)->get();
        @endphp
        <div class="col-12 col-sm-6 col-lg-4 col-xl-3 rejilla">
            <div class="producto">
                <a href="/categoria/{{$slugCategoria[0]['slug']}}/{{$slugSubcategoria[0]['slug']}}/{{$slugArticulo[0]['slug']}}"><img
                        src="{{ asset('images/imagen_articulo/'.$Articulos[$numeroArticulo]->imagen_articulo_id.'.jpg') }}"
                        class="img-fluid"></a>
                <div class="tituloProducto">

                    <h6>
                        <a href="/categoria/{{$slugCategoria[0]['slug']}}/{{$slugSubcategoria[0]['slug']}}/{{$slugArticulo[0]['slug']}}">{{$Articulos[$numeroArticulo]->titulo}}</a>
                    </h6>
                </div>
                <div class="precioProducto">
                    <p>Precio: <span>{{$Articulos[$numeroArticulo]->precio}}</span> €</p>
                </div>
                <div class="controladorCompra">
                    <div class="botonWhish">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="botonComprar">
                        <i class="fas fa-shopping-basket"></i>
                        <p>Añadir al carrito</p>
                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>
<div id="comentariosProducto">
    <hr>
    <h3>Comentarios:</h3>
    @php
        $comentariosProducto=\App\Comentario::join('usuarios','usuarios.id_usuario','=','comentarios.usuario_id')->where('articulo_id',$Articulo[0]->id_articulo)->get();
    @endphp
    @if(sizeof($comentariosProducto)!=0)
        @foreach($comentariosProducto as $comentario)
            <h6><i class="far fa-comments"></i> {{$comentario->titulo}} - <i
                    class="fa fa-user"></i> {{$comentario->nombre}} {{$comentario->apellido1}} {{$comentario->apellido2}}
            </h6>
            <p>{{$comentario->contenido}}</p>
        @endforeach
    @else
        <h5 id="sinComentarios"
            class="alert alert-info"><i class="fa fa-history"></i> No hay comentarios aún, sé el primero!</h5>
    @endif
</div>

