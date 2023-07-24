//funcion muestra empleados
function listarPlatos() {
    $.ajax({
        type: "POST",
        url: "../backend/controller/platosController.php?f=showPlatosCliente",
        success: function (data) {
            document.getElementById('categoriasLista').innerHTML = data;
        },
    });
    return false;
}
listarPlatos();

function llenarDatos(datos) {
    d = datos.split("||");
    $("#moaId").val(d[0]);
    $("#moPlato").html(d[1]);
    $("#moPrecio").html("S/ " + d[2]);
    $("#moaPrecio").val(d[2]);
    $("#moImagen").attr("src", "../" + d[3]);
    $("#moDescripcion").html(d[4]);
}

function agregarProducto(idp, precio) {
    var parametros = {
        idc: id_cliente,
        idp: idp,
        precio: precio,
    };
    $.ajax({
        data: parametros,
        type: "POST",
        url: "../backend/controller/carritoController.php?f=addCarrito",
        success: function (data) {
            if (data == 1) {
                Swal.fire("Listo", "¡Plato agregado a carrito!", "success");
            } else {
                Swal.fire("Advertencia", "¡Este plato ya esta en su carrito!", "info");
            }
        },
    });
    return false;
}

//funcion para agregar al carrito desde el modal
$(document).ready(function () {
    $("#btnAgrearDesdeModal").click(function () {
        var datos = $("#frmCarrito").serialize();
        $.ajax({
            type: "POST",
            url: "../backend/controller/carritoController.php?f=addCarrito",
            data: datos,
            success: function (e) {
                if (e == 1) {
                    Swal.fire("Listo", "¡Plato agregado a carrito!", "success");
                } else {
                    Swal.fire("Advertencia", "¡Este plato ya esta en su carrito!", "info");
                }
            },
        });
        return false;
    });
});
