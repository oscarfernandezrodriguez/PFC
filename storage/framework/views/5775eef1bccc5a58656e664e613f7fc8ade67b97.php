<section>
    <h1 id="cabeceraInfo">Hay <?php echo e(sizeof($Cobros)); ?> pedidos con cobro</h1>
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
                <?php $__currentLoopData = $Cobros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cobro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $empresacobro=\App\Empresa_cobro::where('id_empresa_cobro',$cobro->empresa_cobro_id)->get('nombre_empresa')[0];
                        $empresascobro=\App\Empresa_cobro::all();
                        $estadoscobro=\App\Estado_cobro::all();
                        $estadocobro=\App\Estado_cobro::where('id_estado_cobro',$cobro->estado_cobro_id)->get('descripcion')[0];
                    ?>
                    <tr>
                        <td><?php echo e($cobro->id_cobro); ?></td>
                        <td><?php echo e($cobro->pedido_id); ?></td>
                        <td>
                            <?php

                                echo '<select name"'.$cobro->id_cobro.'"" class="empresa">';
                                    foreach ($empresascobro as $tp){
                                        if($tp->nombre_empresa==strval($empresacobro->nombre_empresa)){
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

                                echo '<select name"'.$cobro->id_cobro.'"" class="estado">';
                                    foreach ($estadoscobro as $tp){
                                        if($tp->descripcion==$estadocobro->descripcion){
                                            echo'<option value="'.$tp->descripcion.'" selected>'.$tp->descripcion.'</option>';
                                        }else{
                                            echo'<option value="'.$tp->descripcion.'">'.$tp->descripcion.'</option>';
                                        }
                                     }
                                    echo '  </select>';
                            ?>
                        </td>
                        <td><?php echo e($cobro->created_at); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </thead>
            </table>
        </div>
    </div>
</section>
<?php /**PATH /var/www/html/PFC/resources/views/partials/paneldecontrol/cobros.blade.php ENDPATH**/ ?>