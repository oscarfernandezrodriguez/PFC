$('th').click(function() {
    var tabla = $(this).parents('table').eq(0)
    var filas = tabla.find('tr:gt(0)').toArray().sort(comparar($(this).index()))
    this.asc = !this.asc
    if (!this.asc) {
        filas = filas.reverse()
    }
    for (var i = 0; i < filas.length; i++) {
        tabla.append(filas[i])
    }
    anadirEstilo($(this), this.asc);
})

function comparar(inicio) {
    return function(a, b) {
        var valA = valorCelda(a, inicio),
            valB = valorCelda(b, inicio)
        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
    }
}

function valorCelda(fila, inicio) {
    return $(fila).children('td').eq(inicio).html()
}

function anadirEstilo(elemento, asc) {
    $("th").each(function(inicio) {
        $(this).removeClass("ordenar");
        $(this).children("i").remove();
    });
    elemento.addClass("ordenar");
    if (asc) elemento.append('<i class="fas fa-arrow-up uptabla"></i>');
    else elemento.append('<i class="fas fa-arrow-down downtabla"></i>');
}
