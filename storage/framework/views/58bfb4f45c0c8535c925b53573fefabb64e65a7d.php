<section>
    <h1 id="cabeceraInfo">Hay <?php echo e(sizeof($usuarios)); ?> usuarios registrados</h1>
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
                <?php $count=0; ?>
                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $tipoUsuario=\App\Tipo_Usuario::join('usuarios','usuarios.tipo_usuario_id','=','tipos_usuario.id_tipo_usuario')->where('usuarios.id_usuario',$usuario->id_usuario)->get('descripcion')[0]->descripcion;
                        $tipoUsuarios=\App\Tipo_Usuario::where('usuario_id',1)->get('descripcion')->toArray();
                        $count++;
                    ?>
                    <tr>
                        <td><?php echo e($usuario->id_usuario); ?></td>
                        <td><?php echo e($usuario->nombre); ?></td>
                        <td><?php echo e($usuario->apellido1); ?> <?php echo e($usuario->apellido2); ?></td>
                        <td>

                                <?php
                                    echo '<select name"'.$usuario->id_usuario.'"">';
                                        foreach ($tipoUsuarios as $tp){
                                            if($tp["descripcion"]==$tipoUsuario){
                                                echo'<option value="'.$tp["descripcion"].'" selected>'.$tp["descripcion"].'</option>';
                                            }else{
                                                echo'<option value="'.$tp["descripcion"].'">'.$tp["descripcion"].'</option>';
                                            }
                                         }
                                        echo '  </select>';
                                ?>

                        </td>
                        <td><?php echo e($usuario->email); ?></td>
                        <td><?php echo e($usuario->password); ?></td>
                        <td><a href="javascript://ajax" onclick="eliminarUsuario('<?php echo e($usuario->id_usuario); ?>');"><i
                                    class="fas fa-times usuarioDelete"></i></a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </thead>
            </table>
        </div>
    </div>
</section>
<?php /**PATH /var/www/html/PFC/resources/views/partials/paneldecontrol/usuarios.blade.php ENDPATH**/ ?>