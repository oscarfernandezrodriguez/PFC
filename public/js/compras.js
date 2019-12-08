function modal(action, titulo, contenido) {
    if ($("#mostrarModal")) {
        $("#mostrarModal").remove();
    }
    clase = null;
    if (action == 'save') {
        clase = 'greenModal';
    } else if (action == "delete" || action == "nosave") {
        clase = 'redModal';
    } else {
        clase = 'greyModal';
    }


    $("#infoTienda").append("<div class=\"modal fade\" id=\"mostrarModal\" tabindex=\"-1\" role=\"dialog\"  aria-hidden=\"true\">\n" +
        "  <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">\n" +
        "    <div class=\"modal-content\">\n" +
        "      <div class=\"modal-header\ " + clase + "\">\n" +
        "        <h5 class=\"modal-title\" id=\"exampleModalLongTitle\">" + titulo + "</h5>\n" +
        "        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">\n" +
        "          <span aria-hidden=\"true\">&times;</span>\n" +
        "        </button>\n" +
        "      </div>\n" +
        "      <div class=\"modal-body\">\n" +
        "        " + contenido + "\n" +
        "      </div>\n" +
        "  </div>\n" +
        "</div>");
    $("#mostrarModal").modal("show");
}

function updateWishlist(idArticulo) {
    $.ajax({
        type: 'POST',
        url: '/panel-de-control/wishlist/guardar/' + idArticulo + '/',
        dataType: 'json',
        success: function (data) {
            titulo = "WishList Alertas";
            action = null;
            if (data == 'save') {
                action = "save";
                contenido = "<i class=\"fas fa-heart heartM\"></i>Se ha añadido a su WishList este producto!";
            } else if (data == 'delete') {
                action = "delete";
                contenido = "<i class=\"fas fa-times-circle times-circleM\"></i>Se ha borrado de su WishList este producto!";
            } else {
                action = "nolog";
                contenido = "<i class=\"fa fa-user userM \"></i>No esta logueado. No puede añadir productos";
            }
            modal(action, titulo, contenido);
        }
    });
}

function updateOrder(idArticulo) {
    $.ajax({
        type: 'POST',
        url: '/panel-de-control/pedido-articulo/guardar/' + idArticulo + '/',
        dataType: 'json',
        success: function (data) {
            titulo = "Pedidos Alertas";
            action = null;
            if (data == 'save') {
                action = "save";
                contenido = "<i class=\"fa fa-shopping-cart shoppingM\"></i>Se ha añadido a su pedido este producto!";
                valor = $('#numeroProductos').val();
                valor = parseInt(valor, 10);
                valor++;
                $('#numeroProductos').val(valor);

            } else if (data == "fail") {
                action = "nosave";
                contenido = "<i class=\"fa fa-user userM \"></i>No se ha podido guardar el pedido, no hay unidades";
            } else {
                action = "nosave";
                contenido = "<i class=\"fa fa-user userM \"></i>No esta logueado. No puede añadir productos";
            }
            modal(action, titulo, contenido);
        }
    });
}

function eliminarArticulo(idArticulo) {
    $.ajax({
        type: 'POST',
        url: '/carrito/borrar/' + idArticulo + '/',
        dataType: 'json',
        success: function (data) {
            titulo = "Pedidos Alertas";
            action = null;
            if (data == 'nosave') {
                action = "nosave";
                contenido = "<i class=\"fa fa-shopping-cart shoppingM\"></i>Se ha borrado de su pedido este producto!";
                valor = $('#numeroProductos').val();
                valor = parseInt(valor, 10);
                valor--;
                $('#numeroProductos').val(valor);

            } else if (data == "fail") {
                action = "nosave";
                contenido = "<i class=\"fa fa-user userM \"></i>No se ha podido borrar las unidades del pedido";
            } else {
                action = "nosave";
                contenido = "<i class=\"fa fa-user userM \"></i>No esta logueado. No puede añadir productos";
            }
            modal(action, titulo, contenido);
        }
    });
}

function vaciarCarrito(idPedido) {
    $.ajax({
        type: 'POST',
        url: '/carrito/vaciar/' + idPedido + '/',
        dataType: 'json',
        success: function (data) {
            titulo = "Pedidos Alertas";
            action = null;
            if (data == 'nosave') {
                action = "nosave";
                contenido = "<i class=\"fa fa-shopping-cart shoppingM\"></i>Se ha vaciado su carrito!";
                valor = $('#numeroProductos').val();
                valor = parseInt(valor, 10);
                if (valor > 0) {
                    valor--;
                    $('#numeroProductos').val(valor);
                }

            } else if (data == "fail") {
                action = "nosave";
                contenido = "<i class=\"fa fa-user userM \"></i>No se ha podido vaciar su carrito";
            } else {
                action = "nosave";
                contenido = "<i class=\"fa fa-user userM \"></i>No esta logueado. No puede añadir productos";
            }
            modal(action, titulo, contenido);
        }
    });
}
$('input').change(function () {
    idArticulo=$(this).attr('name');
    unidades=$(this).val();
    $.ajax({
        type: 'POST',
        url: '/carrito/cambiar/' + idArticulo + '/'+unidades+'/',
        dataType: 'json',
        success: function (data) {
            titulo = "Pedidos Alertas";
            action = null;
            if (data == 'save') {
                action = "save";
                contenido = "<i class=\"fa fa-shopping-cart shoppingM\"></i>Se han cambiado las unidades del producto!";
                            } else if (data == "fail") {
                action = "nosave";
                contenido = "<i class=\"fa fa-user userM \"></i>No se han cambiado las unidades del producto";
            } else {
                action = "nosave";
                contenido = "<i class=\"fa fa-user userM \"></i>No esta logueado. No puede añadir productos";
            }
            modal(action, titulo, contenido);
        }
    });
});
