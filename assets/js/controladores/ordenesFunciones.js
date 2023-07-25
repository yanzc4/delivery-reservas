function llenarCombo() {
    $.ajax({
        type: "POST",
        url: "../../backend/controller/usuarioController.php?f=showRepartidor",
        success: function (data) {
            document.getElementById('idRepartidores').innerHTML = data;
        },
    });
    return false;
}
llenarCombo();

//funcion muestra ordenes
function listarOrdenes() {
    $.ajax({
        type: "POST",
        url: "../../backend/controller/ordenesController.php?f=showOrdenes",
        success: function (data) {
            document.getElementById('nuevaOrden').innerHTML = data;
        },
    });
    return false;
}
listarOrdenes();

function llenarDatos(datos){
    d = datos.split('||');
    $('#idCliente').val(d[0]);
    $('#idPedido').val(d[1]);
}


//funcion para asignar repartidor
$(document).ready(function () {
    $("#btnAsignarRepartidor").click(function () {
        var datos = $("#frmAsignarTrabajadorModal").serialize();
        $.ajax({
            type: "POST",
            url: "../../backend/controller/ordenesController.php?f=asignandoRepartidor",
            data: datos,
            success: function (e) {
                if (e == 1) {
                    Swal.fire("Listo", "¡Orden asignada!", "success");
                    listarOrdenes();
                } else {
                    Swal.fire("Error", "¡No se pudo asignar la orden!", "error");
                }
            },
        });
        return false;
    });
});