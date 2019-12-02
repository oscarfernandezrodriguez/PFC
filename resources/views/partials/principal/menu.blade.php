@php
    $Secciones=App\Seccion::all();
@endphp
<div id="menuProductos">
    <div id="cabeceraMenu">
        <h4>BUSCAR POR CATEGORIAS</h4>
    </div>
    <div id="menuSecciones">
        <ul>
            @foreach($Secciones as $seccion)
                <li><i class="fa fa-arrow-right"></i>{{$seccion->descripcion}}
                    @php
                        $Subseccion=App\Subseccion::where('seccion_id', $seccion->id_seccion)->get();
                    @endphp
                    @if(sizeof($Subseccion)>0)
                        <ul>
                            @foreach($Subseccion as $subseccion)
                                <li><i class="fa fa-angle-right"></i>{{$subseccion->descripcion}}</li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
