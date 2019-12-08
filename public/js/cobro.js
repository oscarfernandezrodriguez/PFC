$('select').change(function () {
    idCobro=$(this).attr('name');
    tipo=$(this).attr('class');
    descripcion=$(this).val();
    if(tipo=="empresa"){
        urlD="/cobro/cambiar-empresa/"+idCobro+"/"+descripcion+"/";
    }else{
        urlD="/cobro/cambiar-estado/"+idCobro+"/"+descripcion+"/";
    }
    $.ajax({
        type: 'POST',
        url: urlD,
        dataType: 'json',
        success: function (data) {
            titulo = "Cobros Alertas";
            action = null;
            if (data == 'save') {
                action = "save";
                contenido = "<i class=\"fas fa-money-bill-wave billM\"></i>Se ha cambiado "+tipo+" del cobro!";
            } else if (data == "fail") {
                action = "nosave";
                contenido = "<i class=\"fas fa-money-bill-wave billM\"></i>No se han cambiado "+tipo+" del cobro!";
            } else {
                action = "nosave";
                contenido = "<i class=\"fas fa-money-bill-wave billM\"></i>No esta logueado. No puede cambiar "+tipo+" del cobro!";
            }
            modal(action, titulo, contenido);
        }
    });
});
