<?php
include_once "../model/categoriaModel.php";
include_once "../../inc/conexion.php";


function addCategoria()
{
    if (!empty($_POST['txtNombreCategoria'])) {
        $conexion = conectar();
        $datos = array(
            "nombre" => $_POST['txtNombreCategoria'],
        );
        insertarCategoria($conexion, $datos);
    } else {
        echo "error";
    }
}

function updateCategoria()
{
    $conexion = conectar();
    $datos = array(
        "id" => $_POST['etxtId'],
        "nombre" => $_POST['etxtNombreCategoria'],
    );
    actualizarCategoria($conexion, $datos);
}

function showCategoria()
{
    $conexion = conectar();
    $resultado = mostrarCategoria($conexion);
?>
    <table class="table bg-tabla">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th>Ajustes</th>
            </tr>
        </thead>
        <tbody class="tb-tabla">
            <?php
            while ($fila = $resultado->fetch_assoc()) {
                $datos = $fila['id'] . "||" .
                    $fila['nombre'];

            ?>
                <tr>
                    <td><?php echo $fila['id'] ?></td>
                    <td><?php echo $fila['nombre'] ?></td>

                    <td>
                        <button class="btn btn-primary" onclick="llenarModal('<?php echo $datos ?>')" data-bs-toggle="modal" data-bs-target="#staticBackdrop-c"><i class='bx bx-edit-alt'></i></button>
                        <button onclick="eliminacion(<?php echo $fila['id'] ?>)" class="btn btn-danger"><i class='bx bx-trash'></i></button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<?php
}


function deleteCategoria()
{
    $conexion = conectar();
    $id = $_POST['id'];
    $resultado = eliminarCategoria($conexion, $id);
    echo $resultado;
}

function showComboCategoria()
{
    $conexion = conectar();
    $resultado = mostrarCategoria($conexion);
?>

    <select class="form-select" name="lsCategoria">
        <?php
        while ($fila = $resultado->fetch_assoc()) {


        ?>
            <option value="<?php echo $fila['id'] ?>"><?php echo $fila['nombre'] ?></option>

        <?php
        }
        ?>
    </select>
<?php
}

function showComboCategoriae()
{
    $conexion = conectar();
    $resultado = mostrarCategoria($conexion);
?>

    <select class="form-select" name="elsCategoria" id="elsCategoria">
        <?php
        while ($fila = $resultado->fetch_assoc()) {


        ?>
            <option value="<?php echo $fila['id'] ?>"><?php echo $fila['nombre'] ?></option>

        <?php
        }
        ?>
    </select>
<?php
}

if (function_exists($_GET['f'])) {
    $_GET['f'](); //llama la función si es que existe
}
