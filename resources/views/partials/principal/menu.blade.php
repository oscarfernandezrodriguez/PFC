<div id="menuProductos">
    <div id="cabeceraMenu">
        <h4>BUSCAR POR CATEGORIAS</h4>
    </div>
    <div id="menuSecciones">
        <ul>
            @foreach($Secciones as $seccion)
                <li><i class="fa fa-arrow-right"></i><a href="/categoria/{{$seccion->slug}}/">{{$seccion->descripcion}}</a>
                    @php
                        $Subseccion=App\Subseccion::where('seccion_id', $seccion->id_seccion)->get();
                    @endphp
                    @if(sizeof($Subseccion)>0)
                        <ul>
                            @foreach($Subseccion as $subseccion)
                                <li><i class="fa fa-angle-right"></i><a href="/categoria/{{$seccion->slug}}/{{$subseccion->slug}}/">{{$subseccion->descripcion}}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
