<section>
    <h1 id="cabeceraInfo">Hay {{sizeof($Cobros)}} pedidos con cobro</h1>
    <div id="wishlistProducto">
        <br>
        <div id="datosUsuario">
            <table id="tablaWish" class="table tablaOrden">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID cobro</th>
                    <th scope="col">Pedido ID</th>
                    <th scope="col">Empresa cobro</th>
                    <th scope="col">Estado cobro</th>
                    <th scope="col">Fecha</th>
                </tr>
                @foreach($Cobros as $cobro)
                    @php
                        $empresacobro=\App\Empresa_cobro::where('id_empresa_cobro',$cobro->empresa_cobro_id)->get('nombre_empresa')[0];
                        $empresascobro=\App\Empresa_cobro::all();
                        $estadoscobro=\App\Estado_cobro::all();
                        $estadocobro=\App\Estado_cobro::where('id_estado_cobro',$cobro->estado_cobro_id)->get('descripcion')[0];
                    @endphp
                    <tr>
                        <td>{{$cobro->id_cobro}}</td>
                        <td>{{$cobro->pedido_id}}</td>
                        <td>
                            @php

                                echo '<select name"'.$cobro->id_cobro.'"" class="empresa">';
                                    foreach ($empresascobro as $tp){
                                        if($tp->nombre_empresa==strval($empresacobro->nombre_empresa)){
                                            echo'<option value="'.$tp->nombre_empresa.'" selected>'.$tp->nombre_empresa.'</option>';
                                        }else{
                                            echo'<option value="'.$tp->nombre_empresa.'">'.$tp->nombre_empresa.'</option>';
                                        }
                                     }
                                    echo '  </select>';
                            @endphp
                        </td>
                        <td>
                            @php

                                echo '<select name"'.$cobro->id_cobro.'"" class="estado">';
                                    foreach ($estadoscobro as $tp){
                                        if($tp->descripcion==$estadocobro->descripcion){
                                            echo'<option value="'.$tp->descripcion.'" selected>'.$tp->descripcion.'</option>';
                                        }else{
                                            echo'<option value="'.$tp->descripcion.'">'.$tp->descripcion.'</option>';
                                        }
                                     }
                                    echo '  </select>';
                            @endphp
                        </td>
                        <td>{{$cobro->created_at}}</td>
                    </tr>
                @endforeach
                </thead>
            </table>
        </div>
    </div>
</section>
