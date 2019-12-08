<section ">
    <h1 id="cabeceraInfo">Información del usuario número [ <?php echo e($idUsuario); ?> ]</h1>

    <div id="infoUser">
        <h3>Datos personales del usuario:</h3>
        <br>
        <table class="table table-striped">
        <tr><td>Nombre:</td><td> <b><?php echo e(\App\Usuario::where('id_usuario',$idUsuario)->get('nombre')[0]->nombre); ?></b></tr>
        <tr><td>Primer Apellido: </td><td><b><?php echo e(\App\Usuario::where('id_usuario',$idUsuario)->get('apellido1')[0]->apellido1); ?></b></td></tr>
        <tr><td>Segundo Apellido:</td><td> <b><?php echo e(\App\Usuario::where('id_usuario',$idUsuario)->get('apellido2')[0]->apellido2); ?></b></td></tr>
        <tr><td>E-mail:</td><td> <b><?php echo e(\App\Usuario::where('id_usuario',$idUsuario)->get('email')[0]->email); ?></b></td></tr>
        <tr><td>Password encriptado:</td><td> <b><?php echo e(\App\Usuario::where('id_usuario',$idUsuario)->get('password')[0]->password); ?></b></td></tr>
        <tr><td>Fecha de alta:</td><td> <b><?php echo e(\App\Usuario::where('id_usuario',$idUsuario)->get('created_at')[0]->created_at); ?></b></td></tr>
        <tr><td>Tipo de cuenta: </td><td><b><?php echo e(\App\Tipo_Usuario::join('usuarios','usuarios.tipo_usuario_id','=','tipos_usuario.id_tipo_usuario')->where('usuarios.id_usuario',$idUsuario)->get('descripcion')[0]->descripcion); ?></b></td></tr>
        </table>
    </div>
</section>
<?php /**PATH /var/www/html/PFC/resources/views/partials/paneldecontrol/infoUsuario.blade.php ENDPATH**/ ?>