@php
    $Articulos=App\Articulo::take(12)->get();
@endphp
@foreach($Articulos as $Articulo)
    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 rejilla">
        <div class="producto">
            <img src="{{ asset('images/imagen_articulo/'.$Articulo->imagen_articulo_id.'.jpg') }}" class="img-fluid">
            <div class="tituloProducto">
                <h6>{{$Articulo->titulo}}</h6>
            </div>
            <div class="precioProducto">
                <p>Precio: <span>{{$Articulo->precio}}</span> €</p>
            </div>
            <div class="controladorCompra">
                <div class="botonWhish">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="botonComprar">
                    <i class="fas fa-shopping-basket"></i><p>Añadir al carrito</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
