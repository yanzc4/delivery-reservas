<?php
include_once "../model/empleadoModel.php";
include_once "../../inc/conexion.php";


function addEmpleado()
{
    $conexion = conectar();
    $datos = array(
        "nombre" => $_POST['nombre'],
        "cel" => $_POST['cel'],
        "dni" => $_POST['dni']
    );
    insertarEmpleado($conexion, $datos);
}

function updateEmpleado()
{
    $conexion = conectar();
    $datos = array(
        "id" => $_POST['ide'],
        "nombre" => $_POST['enombre'],
        "cel" => $_POST['ecel'],
        "dni" => $_POST['edni']
    );
    actualizarEmpleado($conexion, $datos);
}


function showEmpleados()
{
    $conexion = conectar();
    $resultado = mostrarEmpleado($conexion, $_POST['buscar']);
?>
    <table class="table">
        <thead>
            <tr class="text-gris-bajo">
                <th>Cod</th>
                <th>nombre</th>
                <th>cel</th>
                <th>dni</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($fila = $resultado->fetch_assoc()) {
                $datos=$fila['id']."||".
                $fila['nombre']."||".
                $fila['cel']."||".
                $fila['dni'];
            ?>
                <tr>
                    <td><?php echo $fila['id'] ?></td>
                    <td><?php echo $fila['nombre'] ?></td>
                    <td><?php echo $fila['cel'] ?></td>
                    <td><?php echo $fila['dni'] ?></td>
                    <td>
                        <button class="btn btn-warning" onclick="llenarModal('<?php echo $datos ?>')" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='bx bx-edit-alt'></i></button>
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

function deleteEmpleado()
{
    $conexion = conectar();
    $id = $_POST['id'];
    $resultado = eliminarEmpleado($conexion, $id);
    echo $resultado;
}



if (function_exists($_GET['f'])) {
    $_GET['f'](); //llama la función si es que existe
}
?>