<section>
    <h1 id="cabeceraInfo">Hay <?php echo e(sizeof($Envios)); ?> pedidos con envío</h1>
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
                <?php $__currentLoopData = $Envios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $envio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $empresaEnvio=\App\Empresa_transporte::where('id_empresa_transporte',$envio->empresa_transporte_id)->get('nombre_empresa')[0];
                        $empresasEnvio=\App\Empresa_transporte::all();
                        $estadosEnvio=\App\Estado_envio::all();
                        $estadoEnvio=\App\Estado_envio::where('id_estado_envio',$envio->estado_envio_id)->get('descripcion')[0];
                    ?>
                    <tr>
                        <td><?php echo e($envio->id_envio); ?></td>
                        <td><?php echo e($envio->pedido_id); ?></td>
                        <td>
                            <?php

                                echo '<select name"'.$envio->id_envio.'"" class="empresa">';
                                    foreach ($empresasEnvio as $tp){
                                        if($tp->nombre_empresa==strval($empresaEnvio->nombre_empresa)){
                                            echo'<option value="'.$tp->nombre_empresa.'" selected>'.$tp->nombre_empresa.'</option>';
                                        }else{
                                            echo'<option value="'.$tp->nombre_empresa.'">'.$tp->nombre_empresa.'</option>';
                                        }
                                     }
                                    echo '  </select>';
                            ?>
                        </td>
                        <td>
                            <?php

                                echo '<select name"'.$envio->id_envio.'"" class="estado">';
                                    foreach ($estadosEnvio as $tp){
                                        if($tp->descripcion==$estadoEnvio->descripcion){
                                            echo'<option value="'.$tp->descripcion.'" selected>'.$tp->descripcion.'</option>';
                                        }else{
                                            echo'<option value="'.$tp->descripcion.'">'.$tp->descripcion.'</option>';
                                        }
                                     }
                                    echo '  </select>';
                            ?>
                        </td>
                        <td><?php echo e($envio->created_at); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </thead>
            </table>
        </div>
    </div>
</section>
<?php /**PATH /var/www/html/PFC/resources/views/partials/paneldecontrol/envios.blade.php ENDPATH**/ ?>