//funcion muestra empleados
function buscar_ahora(buscar) {
    var parametros = {
        buscar: buscar,
    };
    $.ajax({
        data: parametros,
        type: "POST",
        url: "../../backend/controller/usuarioController.php?f=showUsuario",
        success: function (data) {
            document.getElementById('tablaUsuario').innerHTML = data;
        },
    });
    return false;
}
buscar_ahora("");


//funcion para registrar empleado
$(document).ready(function () {
    $("#btnEnviar").click(function () {
        var datos = $("#frmPrueba").serialize();
        $.ajax({
            type: "POST",
            url: "backend/controller/empleadoController.php?f=addEmpleado",
            data: datos,
            success: function (e) {
                Swal.fire("Listo", "¡Empleado registrado con exito!", "success");
                //funcion para buscar los empleados y mostrarlos en la tabla
                buscar_ahora("");
            },
        });
        return false;
    });
});


//funcion para llenar modal
function llenarModal(datos) {
    d = datos.split("||");
    $("#ide").val(d[0]);
    $("#enombre").val(d[1]);
    $("#ecel").val(d[2]);
    $("#edni").val(d[3]);
}

//funcion para actualizar
$(document).ready(function () {
    $("#btnactualizar").click(function () {
        var datos = $("#frmActualizar").serialize();
        $.ajax({
            type: "POST",
            url: "backend/controller/empleadoController.php?f=updateEmpleado",
            data: datos,
            success: function (e) {
                Swal.fire("Listo", "¡Actualizado con exito!", "success");
                buscar_ahora("");
            },
        });
        return false;
    });
});

//funcion para eliminar
function eliminacion(codigo) {
    Swal.fire({
        title: "¿Deseas eliminar?",
        text: "¡No podra revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Si, eliminar!",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            mandar_php(codigo);
        }
    });
}
//codigo para complementar el de eliminar
function mandar_php(codigo) {
    parametros = {
        id: codigo,
    };
    $.ajax({
        data: parametros,
        url: "backend/controller/empleadoController.php?f=deleteEmpleado",
        type: "POST",
        success: function (r) {
            if (r == 1) {
                Swal.fire("Listo", "¡Eliminado con exito!", "success");
                buscar_ahora("");
            } else {
                Swal.fire("Error", "¡No se pudo eliminar!", "error");
            }
        },
    });
}