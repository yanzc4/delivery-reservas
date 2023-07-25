//funcion muestra ordenes
function listarOrdenes(id) {
    parametros = {
        "id": id
    };
    $.ajax({
        type: "POST",
        url: "../../backend/controller/ordenesController.php?f=showOrdenes2",
        data: parametros,
        success: function (data) {
            document.getElementById('nuevaOrden').innerHTML = data;
        },
    });
    return false;
}
listarOrdenes(idTrabajador);

//funcion para preguntar si quiere enttegar la orden con swalert
function entregarPedido(id) {
    Swal.fire({
        title: 'Entregar pedido',
        text: "¿Estas seguro que quieres entregar el pedido?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#dc3545',
        confirmButtonText: 'Si, entregar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            entregar(id);
        }
    })
}

//funcion para entregar la orden
function entregar(id) {
    parametros = {
        "idp": id
    };
    $.ajax({
        type: "POST",
        url: "../../backend/controller/ordenesController.php?f=newEntrega",
        data: parametros,
        success: function (data) {
            if (data == 1) {
                Swal.fire(
                    'Entregado!',
                    'El pedido se ha entregado.',
                    'success'
                )
                listarOrdenes(idTrabajador);
            } else {
                Swal.fire(
                    'Error!',
                    'El pedido no se ha entregado.',
                    'error'
                )
            }
        },
    });
    return false;
}