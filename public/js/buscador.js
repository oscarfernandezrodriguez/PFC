$('#buscadorI').keyup(function(){
    $("#resultadoBusqueda").remove();
    valor=$(this).val();
    $.ajax({
        type: 'POST',
        url: '/buscar/articulo/'+valor+'/',
        dataType:"json",
        success: function(datos)
        {
            var maximo = Object.keys(datos).length;
            salida='<div id="resultadoBusqueda">';
            for(i=0;i<maximo;i++){
                salida+="<div><a href=\""+datos[i]["slug_seccion"]+"/"+datos[i]["slug_subseccion"]+"/"+datos[i]["slug"]+"\"><img src=\"/images/imagen_articulo/"+datos[i]["imagen_articulo_id"]+".jpg\"> "+datos[i]["titulo"]+"</div></a>";
            }
            salida+='</div>';
            $('#buscador').append(salida);
        },
    })
  });

$('#buscadorI').blur(function(){
    $("#resultadoBusqueda").remove();
});
$('#buscadorI').focus(function(){
    $("#resultadoBusqueda").remove();
});


