$('select').change(function () {
    idUsuario=$(this).attr('name');
    rol=$(this).val();
    $.ajax({
        type: 'POST',
        url: '/usuario/cambiarRol/' + idUsuario + '/'+rol+'/',
        dataType: 'json',
        success: function (data) {
            titulo = "Usuarios Alertas";
            action = null;
            if (data == 'save') {
                action = "save";
                contenido = "<i class=\"fa fa-user userM\"></i>Se ha cambiado el rol del usuario!";
            } else if (data == "fail") {
                action = "nosave";
                contenido = "<i class=\"fa fa-user userM \"></i>No se han cambiado los roles del usuario";
            } else {
                action = "nosave";
                contenido = "<i class=\"fa fa-user userM \"></i>No esta logueado. No puede cambiar roles";
            }
            modal(action, titulo, contenido);
        }
    });
});
function eliminarUsuario(idUsuario) {
    $.ajax({
        type: 'POST',
        url: '/usuario/eliminar/' + idUsuario + '/',
        dataType: 'json',
        success: function (data) {
            titulo = "Usuarios Alertas";
            action = null;
            if (data == 'delete') {
                action = "delete";
                contenido = "<i class=\"fa fa-user userM\"></i>Se eliminado el usuario!";
            } else if (data == "fail") {
                action = "save";
                contenido = "<i class=\"fa fa-user userM \"></i>No se ha podido eliminar usuario";
            } else {
                action = "nosave";
                contenido = "<i class=\"fa fa-user userM \"></i>No esta logueado. No puede eliminar usuarios";
            }
            modal(action, titulo, contenido);
        }
    });
}
