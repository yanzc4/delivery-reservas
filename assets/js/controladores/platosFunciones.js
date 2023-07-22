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
