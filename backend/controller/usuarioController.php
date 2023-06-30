<?php
include_once "../model/usuarioModel.php";
include_once "../../inc/conexion.php";


function showUsuario()
{
    $conexion = conectar();
    $resultado = mostrarUsuario($conexion, $_POST['buscar']);
?>
    <table class="table bg-tabla">
        <thead>
            <tr>
                <th>Id</th>
                <th>user</th>
                <th>pass</th>
                <th>nombre</th>
              
            </tr>
        </thead>
        <tbody class="tb-tabla">
            <?php
            while ($fila = $resultado->fetch_assoc()) {
                $datos = $fila['id'] . "||" .
                    $fila['user'] . "||" .
                    $fila['pass'] . "||" .
                    $fila['nombre'];
                   

            ?>
                <tr>
                    <td><?php echo $fila['id'] ?></td>
                    <td><?php echo $fila['user'] ?></td>
                    <td><?php echo $fila['pass'] ?></td>
                    <td><?php echo $fila['nombre'] ?></td>
                   
                    <td>
                        <button class="btn btn-warning" onclick="llenarModal('<?php echo $datos ?>')" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bx-edit-alt'></i></button>
                        <button class="btn btn-danger" onclick="eliminacion(<?php echo $fila['id'] ?>)"><i class='bx bxs-trash'></i></button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<?php
}

if (function_exists($_GET['f'])) {
    $_GET['f'](); //llama la función si es que existe
}
?>