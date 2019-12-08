$('select').change(function () {
    idEnvio=$(this).attr('name');
    tipo=$(this).attr('class');
    descripcion=$(this).val();
    if(tipo=="empresa"){
        urlD="/envio/cambiar-empresa/"+idEnvio+"/"+descripcion+"/";
    }else{
        urlD="/envio/cambiar-estado/"+idEnvio+"/"+descripcion+"/";
    }
    $.ajax({
        type: 'POST',
        url: urlD,
        dataType: 'json',
        success: function (data) {
            titulo = "Envios Alertas";
            action = null;
            if (data == 'save') {
                action = "save";
                contenido = "<i class=\"fas fa-truck truckM\"></i>Se ha cambiado "+tipo+" del envio!";
            } else if (data == "fail") {
                action = "nosave";
                contenido = "<i class=\"fas fa-truck truckM\"></i>No se han cambiado "+tipo+" del envio!";
            } else {
                action = "nosave";
                contenido = "<i class=\"fas fa-truck truckM\"></i>No esta logueado. No puede cambiar "+tipo+" del envio!";
            }
            modal(action, titulo, contenido);
        }
    });
});
