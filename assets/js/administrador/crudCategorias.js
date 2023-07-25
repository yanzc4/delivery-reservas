//funcion muestra empleados
function buscar_ahora() {
    $.ajax({
        type: "POST",
        url: "../../backend/controller/categoriaController.php?f=showCategoria",
        success: function (data) {
            document.getElementById('tablaCategorias').innerHTML = data;
        },
    });
    return false;
}
buscar_ahora();


function llenar_combo() {
    $.ajax({
        type: "POST",
        url: "../../backend/controller/categoriaController.php?f=showComboCategoria",
        success: function (data) {
            document.getElementById('combo').innerHTML = data;
        },
    });
    return false;
}
llenar_combo();

//funcion para registrar categoria
$(document).ready(function () {
    $("#btnAgregarCategoria").click(function () {
        var datos = $("#frmAgregarCategoria").serialize();
        $.ajax({
            type: "POST",
            url: "../../backend/controller/categoriaController.php?f=addCategoria",
            data: datos,
            success: function (e) {
                Swal.fire("Listo", "¡Categoria registrada con exito!", "success");
                //funcion para buscar los empleados y mostrarlos en la tabla
                buscar_ahora();
                llenar_combo();
            },
        });
        return false;
    });
});


//funcion para llenar modal
function llenarModal(datos) {
    d = datos.split("||");
    $("#etxtId").val(d[0]);
    $("#etxtNombreCategoria").val(d[1]);
}

//funcion para actualizar categoria
$(document).ready(function () {
    $("#btnEditarCategoria").click(function () {
        var datos = $("#frmEditarCategoria").serialize();
        $.ajax({
            type: "POST",
            url: "../../backend/controller/categoriaController.php?f=updateCategoria",
            data: datos,
            success: function (e) {
                Swal.fire("Listo", "¡Actualizado con exito!", "success");
                buscar_ahora();
                llenar_combo();
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
        url: "../../backend/controller/categoriaController.php?f=deleteCategoria",
        type: "POST",
        success: function (r) {
            if (r == 1) {
                Swal.fire("Listo", "¡Eliminado con exito!", "success");
                buscar_ahora();
                llenar_combo();
            } else {
                Swal.fire("Error", "¡No se pudo eliminar!", "error");
            }
        },
    });
}

function listarPlatosAdmin() {
    $.ajax({
        type: "POST",
        url: "../../backend/controller/platosController.php?f=showPlatosAdmin",
        success: function (data) {
            document.getElementById('tablaPlatosAdmin').innerHTML = data;
        },
    });
    return false;
}
listarPlatosAdmin();

//funcion para registrar plato
$(document).ready(function () {
    $("#btnRegistrarPlato").click(function () {
        var formData = new FormData(document.getElementById("frmRegistrarPlato"));
        $.ajax({
            type: "POST",
            url: "../../backend/controller/platosController.php?f=addPlatoAdmin",
            data: formData,
            processData: false,
            contentType: false,
            success: function (e) {
                    if (e == 1) {
                        Swal.fire("Listo", "¡Plato registrado con exito!", "success");
                    //funcion para buscar los empleados y mostrarlos en la tabla
                    listarPlatosAdmin();
                    //resetear formulario
                    document.getElementById("frmRegistrarPlato").reset();
                    }else{
                        Swal.fire("Error", "¡No se pudo registrar el plato!", "error");
                    }

            },
        });
        return false;
    });
});

function llenar_comboe() {
    $.ajax({
        type: "POST",
        url: "../../backend/controller/categoriaController.php?f=showComboCategoriae",
        success: function (data) {
            document.getElementById('comboe').innerHTML = data;
        },
    });
    return false;
}

//funcion para llenar modal platos
function llenarModalPlatos(datos2) {
    d = datos2.split("||");
    $("#ide").val(d[0]);
    $("#txtNombre").val(d[1]);
    $("#txtPrecio").val(d[2]);
    $("#myarea").val(d[4]);
}

//funcion para actualizar plato
$(document).ready(function () {
    $("#btnEditarPlato").click(function () {
        var datos = $("#frmEditarPlato").serialize();
        $.ajax({
            type: "POST",
            url: "../../backend/controller/platosController.php?f=editPlatosAdmin",
            data: datos,
            success: function (e) {
                if (e == 1) {
                    Swal.fire("Listo", "¡Plato actualizado con exito!", "success");
                //funcion para buscar los empleados y mostrarlos en la tabla
                listarPlatosAdmin();
                }else{
                    Swal.fire("Error", "¡No se pudo actualizar el plato!", "error");
                }
            },
        });
        return false;
    });
});

//funcion para eliminar plato
function eliminacionPlatoAdmin(codigo) {
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
            mandaEliminar(codigo);
        }
    });
}

//codigo para complementar el de eliminar
function mandaEliminar(codigo) {
    parametros = {
        id: codigo,
    };
    $.ajax({
        data: parametros,
        url: "../../backend/controller/platosController.php?f=deletePlatosAdmin",
        type: "POST",
        success: function (r) {
            if (r == 1) {
                Swal.fire("Listo", "¡Eliminado con exito!", "success");
                listarPlatosAdmin();
            } else {
                Swal.fire("Error", "¡No se pudo eliminar ya se han hecho compras!", "error");
            }
        },
    });
}