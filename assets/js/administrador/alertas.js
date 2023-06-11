//funcion para actualizar empleado
$(document).ready(function () {
    $("#btnActualizarEmpleado").click(function () {
      var datos = $("#frmActualizarEmpleado").serialize();
      $.ajax({
        type: "POST",
        url: "../../backend/admin/actualizarEmpleado.php",
        data: datos,
        success: function (e) {
          Swal.fire("Listo", "¡Actualizado con exito!", "success");
          //funcion para buscar los empleados y mostrarlos en la tabla
        },
      });
      return false;
    });
  });

  //funcion para registrar empleado
  $(document).ready(function () {
    $("#btnRegistrarEmpleado").click(function () {
      var datos = $("#frmRegistrarEmpleado").serialize();
      $.ajax({
        type: "POST",
        url: "../../backend/admin/agregarEmpleado.php",
        data: datos,
        success: function (e) {
          Swal.fire("Listo", "¡Empleado registrado con exito!", "success");
          //funcion para buscar los empleados y mostrarlos en la tabla
        },
      });
      return false;
    });
  });

  //funcion para eliminar con directo
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
      idv: codigo,
    };
    $.ajax({
      data: parametros,
      url: "../../backend/admin/actualizarEmpleado.php",
      type: "POST",
      success: function (r) {
        Swal.fire("Listo", "¡Empleado eliminado con exito!", "success");
        //funcion para buscar los empleados y mostrarlos en la tabla
      },
    });
  }

/* ===================================================================================== */
  //funcion para actualizar plato
$(document).ready(function () {
  $("#btnEditarPlato").click(function () {
    var datos = $("#frmEditarPlato").serialize();
    $.ajax({
      type: "POST",
      url: "../../backend/admin/actualizarEmpleado.php",
      data: datos,
      success: function (e) {
        Swal.fire("Listo", "¡Actualizado con exito!", "success");
        //funcion para buscar los empleados y mostrarlos en la tabla
      },
    });
    return false;
  });
});

//funcion para registrar plato
$(document).ready(function () {
  $("#btnRegistrarPlato").click(function () {
    var datos = $("#frmRegistrarPlato").serialize();
    $.ajax({
      type: "POST",
      url: "../../backend/admin/actualizarEmpleado.php",
      data: datos,
      success: function (e) {
        Swal.fire("Listo", "¡Plato registrado con exito!", "success");
        //funcion para buscar los empleados y mostrarlos en la tabla
      },
    });
    return false;
  });
});

//funcion para eliminar con directo
function ePlato(codigo) {
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
      mandarId(codigo);
    }
  });
}

//codigo para complementar el de eliminar
function mandarId(codigo) {
  parametros = {
    idp: codigo,
  };
  $.ajax({
    data: parametros,
    url: "../../backend/admin/actualizarEmpleado.php",
    type: "POST",
    success: function (r) {
      Swal.fire("Listo", "¡Plato eliminado con exito!", "success");
      //funcion para buscar los empleados y mostrarlos en la tabla
    },
  });
}


/* ===================================================================================== */

  //funcion para actualizar categoria
  $(document).ready(function () {
    $("#btnEditarCategoria").click(function () {
      var datos = $("#frmEditarCategoria").serialize();
      $.ajax({
        type: "POST",
        url: "../../backend/admin/actualizarEmpleado.php",
        data: datos,
        success: function (e) {
          Swal.fire("Listo", "¡Actualizado con exito!", "success");
          //funcion para buscar los empleados y mostrarlos en la tabla
        },
      });
      return false;
    });
  });
  
  //funcion para registrar categoria
  $(document).ready(function () {
    $("#btnAgregarCategoria").click(function () {
      var datos = $("#frmAgregarCategoria").serialize();
      $.ajax({
        type: "POST",
        url: "../../backend/admin/actualizarEmpleado.php",
        data: datos,
        success: function (e) {
          Swal.fire("Listo", "¡Categoria registrada con exito!", "success");
          //funcion para buscar los empleados y mostrarlos en la tabla
        },
      });
      return false;
    });
  });
  
  //funcion para eliminar con categoria
  function eCategoria(codigo) {
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
        mandarCate(codigo);
      }
    });
  }
  
  //codigo para complementar el de eliminar
  function mandarCate(codigo) {
    parametros = {
      idp: codigo,
    };
    $.ajax({
      data: parametros,
      url: "../../backend/admin/actualizarEmpleado.php",
      type: "POST",
      success: function (r) {
        Swal.fire("Listo", "¡Categoria eliminada con exito!", "success");
        //funcion para buscar los empleados y mostrarlos en la tabla
      },
    });
  }
  
  /* ===================================================================================== */
  