<section>
    <h1 id="cabeceraInfo">Hay {{sizeof($Envios)}} pedidos con envío</h1>
    <div id="wishlistProducto">
        <br>
        <div id="datosUsuario">
            <table id="tablaWish" class="table tablaOrden">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Envio</th>
                    <th scope="col">Pedido ID</th>
                    <th scope="col">Empresa envio</th>
                    <th scope="col">Estado envio</th>
                    <th scope="col">Fecha</th>
                </tr>
                @foreach($Envios as $envio)
                    @php
                        $empresaEnvio=\App\Empresa_transporte::where('id_empresa_transporte',$envio->empresa_transporte_id)->get('nombre_empresa')[0];
                        $empresasEnvio=\App\Empresa_transporte::all();
                        $estadosEnvio=\App\Estado_envio::all();
                        $estadoEnvio=\App\Estado_envio::where('id_estado_envio',$envio->estado_envio_id)->get('descripcion')[0];
                    @endphp
                    <tr>
                        <td>{{$envio->id_envio}}</td>
                        <td>{{$envio->pedido_id}}</td>
                        <td>
                            @php

                                echo '<select name"'.$envio->id_envio.'"" class="empresa">';
                                    foreach ($empresasEnvio as $tp){
                                        if($tp->nombre_empresa==strval($empresaEnvio->nombre_empresa)){
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

                                echo '<select name"'.$envio->id_envio.'"" class="estado">';
                                    foreach ($estadosEnvio as $tp){
                                        if($tp->descripcion==$estadoEnvio->descripcion){
                                            echo'<option value="'.$tp->descripcion.'" selected>'.$tp->descripcion.'</option>';
                                        }else{
                                            echo'<option value="'.$tp->descripcion.'">'.$tp->descripcion.'</option>';
                                        }
                                     }
                                    echo '  </select>';
                            @endphp
                        </td>
                        <td>{{$envio->created_at}}</td>
                    </tr>
                @endforeach
                </thead>
            </table>
        </div>
    </div>
</section>
