<?php
include_once "../model/clienteModel.php";
include_once "../../inc/conexion.php";


function addCliente()
{
    $conexion = conectar();
    $datos = array(
        "user" => $_POST['user'],
        "password" => $_POST['password'],
        "nombre" => $_POST['nombre'],
        "apellido" => $_POST['apellido'],
        "fechaNacimiento" => $_POST['fechaNacimiento'],
        "celular" => $_POST['celular'],
        "direccion" => $_POST['direccion'],
        "email" => $_POST['email']
    );
    insertarCliente($conexion, $datos);
}

// function updateCliente()
// {
//     $conexion = conectar();
//     $datos = array(
//         "id" => $_POST['txtId'],
//         "user" => $_POST['txtUser'],
//         "pass" => $_POST['password'],
//         "nombre" => $_POST['txtNombre'],
//         "email" => $_POST['email'],
//         "telefono" => $_POST['phoneNumber'],
//         "f_nacimiento" => $_POST['txtFechaNacimineto'],
//         "rol" => $_POST['chkCargo'],
//         "direccion" => $_POST['txtDireccion']
//     );
//     actualizarUsuario($conexion, $datos);
// }

// function showCliente()
// {
//     $conexion = conectar();
//     $resultado = mostrarUsuario($conexion, $_POST['buscar']);
// ?>
<!-- //     <table class="table bg-tabla">
//         <thead>
//             <tr>
//                 <th>Id</th>
//                 <th>user</th>
//                 <th>pass</th>
//                 <th>nombre</th>
//                 <th>Ajustes</th>
              
//             </tr>
//         </thead>
//         <tbody class="tb-tabla"> -->
//             <?php
//             while ($fila = $resultado->fetch_assoc()) {
//                 $datos = $fila['id'] . "||" .
//                     $fila['user'] . "||" .
//                     $fila['pass'] . "||" .
//                     $fila['nombre'] . "||" .
//                     $fila['email'] . "||" .
//                     $fila['telefono'] . "||" .
//                     $fila['f_nacimiento'] . "||" .
//                     $fila['rol'] . "||" .
//                     $fila['direccion'];
                   

//             ?>
<!-- //                 <tr>
//                     <td><?php echo $fila['id'] ?></td>
//                     <td><?php echo $fila['user'] ?></td>
//                     <td><?php echo $fila['pass'] ?></td>
//                     <td><?php echo $fila['nombre'] ?></td>
                   
//                     <td>
//                         <button class="btn btn-warning" onclick="llenarModal('<?php echo $datos ?>')" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bx-edit-alt'></i></button>
//                         <button class="btn btn-danger" onclick="eliminacion(<?php echo $fila['id'] ?>)"><i class='bx bxs-trash'></i></button>
//                     </td>
//                 </tr>
//             <?php
//             }
//             ?>
//         </tbody>
//     </table> -->
// <?php
// }


// function deleteCliente()
// {
//     $conexion = conectar();
//     $id = $_POST['id'];
//     $resultado = eliminarUsuario($conexion, $id);
//     echo $resultado;
// }

if (function_exists($_GET['f'])) {
    $_GET['f'](); //llama la función si es que existe
}
?>