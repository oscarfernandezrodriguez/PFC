<section>
    <h1 id="cabeceraInfo">Hay {{sizeof($usuarios)}} usuarios registrados</h1>
    <div id="wishlistProducto">
        <br>
        <div id="datosUsuario">
            <table id="tablaWish" class="table tablaOrden">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Tipo de Usuario</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Eliminar</th>
                </tr>
                @php $count=0; @endphp
                @foreach($usuarios as $usuario)
                    @php
                        $tipoUsuario=\App\Tipo_Usuario::join('usuarios','usuarios.tipo_usuario_id','=','tipos_usuario.id_tipo_usuario')->where('usuarios.id_usuario',$usuario->id_usuario)->get('descripcion')[0]->descripcion;
                        $tipoUsuarios=\App\Tipo_Usuario::where('usuario_id',1)->get('descripcion')->toArray();
                        $count++;
                    @endphp
                    <tr>
                        <td>{{$usuario->id_usuario}}</td>
                        <td>{{$usuario->nombre}}</td>
                        <td>{{$usuario->apellido1}} {{$usuario->apellido2}}</td>
                        <td>

                                @php
                                    echo '<select name"'.$usuario->id_usuario.'"">';
                                        foreach ($tipoUsuarios as $tp){
                                            if($tp["descripcion"]==$tipoUsuario){
                                                echo'<option value="'.$tp["descripcion"].'" selected>'.$tp["descripcion"].'</option>';
                                            }else{
                                                echo'<option value="'.$tp["descripcion"].'">'.$tp["descripcion"].'</option>';
                                            }
                                         }
                                        echo '  </select>';
                                @endphp

                        </td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->password}}</td>
                        <td><a href="javascript://ajax" onclick="eliminarUsuario('{{$usuario->id_usuario}}');"><i
                                    class="fas fa-times usuarioDelete"></i></a></td>
                    </tr>
                @endforeach
                </thead>
            </table>
        </div>
    </div>
</section>
