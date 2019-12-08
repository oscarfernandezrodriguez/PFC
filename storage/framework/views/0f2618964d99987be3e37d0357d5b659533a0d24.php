<section>
    <?php if($sinPedido==0): ?>
        <h1 id="cabeceraInfo">Finalizando compra de pedido nº <?php echo e($idPedido[0]->id_pedido); ?></h1>
    <?php else: ?>
        <h1 id="cabeceraInfo"
            class="alert alert-info"><i class="fa fa-history"></i> No tienes pedidos aún. Navega por la
            web y descubre nuestras ofertas!</h1>
    <?php endif; ?>
    <div id="pedidoProducto">
        <form method="POST" action="<?php echo e(route('compraRealizada')); ?>">
            <?php echo e(csrf_field()); ?>

        <br>
        <?php if($sinPedido==0): ?>
            <?php if(sizeof($Articulos)!=0): ?>
                <?php $count=0; ?>
                <div id="datosPedido">
                    <div id="enviosf">
                        <fieldset class="finalizar">
                            <legend class="finalizarl">Datos de envio:</legend>

                            <div class="row ">
                                <div class="col-md-10">
                                    <span class="help-block text-muted">  Seleccione la empresa de envío</span>
                                    <?php
                                        $empresas=\App\Empresa_transporte::all();
    echo '<select class="form-control" name="envio" class="envio">';
                                        foreach($empresas as $empresa){
                                            echo'<option value="'.$empresa->nombre_empresa.'">'.$empresa->nombre_empresa.'</option>';
                                        }
                                         echo '  </select>';
                                    ?>
                                </div>
                            </div>
                            <br>
                            <div class="row ">
                                <div class="col-md-10">
                                    <span class="help-block text-muted ">  Seleccione la forma de envío</span>
                                    <?php
                                        $envios=\App\Tipos_Transporte::all();
                                    echo '<select  class="form-control" name="tipoenvio" class="tipoenvio">';
                                       foreach($envios as $envio){
                                                echo'<option value="'.$envio->descripcion.'">'.$envio->descripcion.'</option>';
                                        }
                                        echo '  </select>';
                                    ?>
                                </div>
                            </div>
                            <br>
                            <div class="row ">
                                <div class="col-md-10">
                                    <span class="help-block text-muted">  Seleccione la empresa del pagoo</span>
                                    <?php
                                        $empresas=\App\Empresa_cobro::all();
                                         echo '<select class="form-control" name="cobro" class="cobro">';
                                        foreach($empresas as $empresa){
                                            echo'<option value="'.$empresa->nombre_empresa.'">'.$empresa->nombre_empresa.'</option>';
                                        }
                                         echo '  </select>';
                                    ?>
                                </div>
                            </div>
                            <br>
                            <div class="row ">
                                <div class="col-md-10">
                                    <span class="help-block text-muted">  Seleccione la forma de pago</span>
                                    <?php
                                        $cobros=\App\Tipos_Cobro::all();
                                        echo '<select  class="form-control" name="tipocobro" class="tipocobro">';
                                        foreach($cobros as $cobro){
                                                echo'<option value="'.$cobro->descripcion.'">'.$cobro->descripcion.'</option>';
                                        }
                                         echo '  </select>';
                                    ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div id="tarjetaf" class="col-12 mb-4">
                        <fieldset class="col-12 finalizar">
                            <legend class="finalizarl">Tarjeta de crédito:</legend>
                            <br>
                            <div class="row ">
                                <div class="col-md-12">
                                    <span class="help-block text-muted small-font">  Número de la tarjeta</span>
                                    <input type="text" class="form-control" name="tarjeta" maxlength="16"
                                           placeholder="Introduce el numero de la tarjeta"/>
                                </div>
                            </div>
                            <br>
                            <div class="row ">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <span class="help-block text-muted small-font"> Mes de expiración</span>
                                    <input type="text" name="mes" class="form-control"  maxlength="2" placeholder="MM"/>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <span class="help-block text-muted small-font">  Año de expiración</span>
                                    <input type="text" name="ano"class="form-control"  maxlength="2"placeholder="YY"/>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <span class="help-block text-muted small-font">  CCV</span>
                                    <input type="text" name="cvv" class="form-control" maxlength="3" placeholder="CCV"/>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <i class="fab fa-cc-visa visaC"></i>
                                </div>
                            </div>
                            <br>
                            <div class="row ">
                                <div class="col-md-12 pad-adjust">
                                    <span class="help-block text-muted small-font">  Nombre de la tarjeta</span>
                                    <input type="text"  name="titular" class="form-control" placeholder="Nombre de la tarjeta"/>
                                </div>



                                  <?php if($errors->has('tarjeta')|| $errors->has('titular')||$errors->has('cvv') || $errors->has('ano') || $errors->has('mes')): ?> <span class="alert alert-danger col-12 mt-4" role="alert"> <b>No ha introducido datos válidos </b></span>    <?php endif; ?>


                            </div>
                        </fieldset>


                    </div>
                </div>
                <?php $__currentLoopData = $Articulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Articulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $total=0;
                         $total+=($Articulo->precio)*($Articulo->unidades_pedido);
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <h5 id="Pedidos"
                    class="alert alert-info"><i class="fa fa-history"></i> No tienes pedidos aún. Navega por la
                    web y descubre nuestras ofertas!</h5>
            <?php endif; ?>
    </div>
    <h1 class="offset-8"><?php if(isset($total)){echo'<b>Total:  </b>'.$total.'€';} ?> </h1>
    <div id="controladorCarrito">
        <div id="vaciarCarrito"><p><a href="javascript://ajax"
                                      onclick="location.href ='/carrito/'">Cancelar Finalización</a>
            </p></div>
        <div id="procesarCompra"><button type="submit">Finalizar compra</button></div>
    </form>
    </div>
    <?php endif; ?>
</section>


<?php /**PATH /var/www/html/PFC/resources/views/partials/carrito/finalizar.blade.php ENDPATH**/ ?>