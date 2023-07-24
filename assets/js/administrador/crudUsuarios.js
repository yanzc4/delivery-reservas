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
    $("#btnRegistrarEmpleado").click(function () {
        var datos = $("#frmRegistrarEmpleado").serialize();
        $.ajax({
            type: "POST",
            url: "../../backend/controller/usuarioController.php?f=addUsuario",
            data: datos,
            success: function (e) {
                if (e == 1) {
                Swal.fire("Listo", "¡Empleado registrado con exito!", "success");
                    //funcion para buscar los empleados y mostrarlos en la tabla
                buscar_ahora("");
                }else{
                    Swal.fire("Error", "¡No se pudo registrar!", "error");
                }
                
            },
        });
        return false;
    });
});


//funcion para llenar modal
function llenarModal(datos) {
    d = datos.split("||");
    $("#id").val(d[0]);
    $("#user").val(d[1]);
    $("#password").val(d[2]);
    $("#nombre").val(d[3]);
    $("#email").val(d[4]);
    $("#phoneNumber").val(d[5]);
    $("#fecha_nacimiento").val(d[6]);
    $("#chkCargo").val(d[7]);
    $("#direccion").val(d[8]);
     
}

//funcion para actualizar
$(document).ready(function () {
    $("#btnActualizarEmpleado").click(function () {
        var datos = $("#frmActualizarEmpleado").serialize();
        $.ajax({
            type: "POST",
            url: "../../backend/controller/usuarioController.php?f=updateUsuario",
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
        url: "../../backend/controller/usuarioController.php?f=deleteUsuario",
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