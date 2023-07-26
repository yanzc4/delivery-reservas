<?php
include_once "../model/carritoModel.php";
include_once "../../inc/conexion.php";


function addCarrito()
{
    $conexion = conectar();
    $datos = array(
        "id_cliente" => $_POST['idc'],
        "id_producto" => $_POST['idp'],
        "precio" => $_POST['precio']
    );

    $resultado = comprobarCarrito($conexion, $_POST['idc'], $_POST['idp']);
    if ($resultado->num_rows == 0) {
        agregarCarrito($conexion, $datos);
        echo 1;
    } else {
        echo 0;
    }
}

function updateCarrito()
{
    $conexion = conectar();
    $datos = array(
        "id_cliente" => $_POST['idc'],
        "id_producto" => $_POST['idp'],
        "cantidad" => $_POST['cant']
    );
    actualizarCarrito($conexion, $datos);
}

function existeProducto()
{
    $conexion = conectar();
    $resultado = comprobarCarrito($conexion, $_POST['idc'], $_POST['idp']);
    if ($resultado->num_rows > 0) {
        echo 1;
    } else {
        echo 0;
    }
}

function showCarrito()
{
    $conexion = conectar();
    $resultado = mostrarCarrito($conexion, $_POST['buscar']);
    $total = 0.00;
?>
    <h3 class="mt-3">Pedidos</h3>
    <div class="row">

        <?php
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {

                $total = $total + $fila['subtotal'];
        ?>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-4 align-center pe-0 ps-0">
                                <img class="img3" src="../<?php echo $fila['imagen'] ?>" alt="bebida">
                            </div>
                            <div class="col-8 pt-2 align-items-center">
                                <label class="w-100 text-wrap"><?php echo $fila['nombre'] ?></label><br>
                                <span class="row mt-1">
                                    <span class="col-8">
                                        <?php
                                        if ($fila['cantidad'] == 1) {
                                            $botond = "disabled";
                                        } else {
                                            $botond = "";
                                        }
                                        ?>
                                        <button <?php echo $botond ?> onclick="disminuirCarrito(<?php echo $fila['id_cliente'] ?>, <?php echo $fila['id_producto'] ?>, <?php echo $fila['cantidad'] ?> - 1)" class="btn-cantidad">-</button>
                                        
                                        <label for="" class="fs-8 pe-1 ps-1"><?php echo $fila['cantidad'] ?></< /label>
                                            <button onclick="aumentarCarrito(<?php echo $fila['id_cliente'] ?>, <?php echo $fila['id_producto'] ?>, <?php echo $fila['cantidad'] ?> + 1)" class="btn-cantidad">+</button>
                                    </span>
                                    <span class="col-4 text-end">
                                        <button onclick="eliminacion(<?php echo $fila['id_cliente'] ?>, <?php echo $fila['id_producto'] ?>)" class="btn-cantidad"><i class='fs-8 bx bxs-trash-alt'></i></button>
                                    </span>
                                </span>
                                <label for="" class="text-rosa fw-bold pt-1">S/ <?php echo $fila['precio'] ?></< /label>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<h4 class='text-center'>No hay productos en el carrito</h4>";
            $boton = "disabled";
        }
        ?>
    </div>
    <div class="row mt-3">
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
            <label class="fw-bold" for="">Total a pagar</label>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
            <label for="">S/ <?php echo $total ?></label>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
            <button <?php echo $boton ?> onclick="crearPedido()" class="btn-rosa">
                <span class="material-symbols-outlined">payments</span>
                <label for=""> Pagar</label>
            </button>
        </div>
    </div>
<?php
}

function deleteProducto()
{
    $conexion = conectar();
    $idc = $_POST['idc'];
    $idp = $_POST['idp'];
    $resultado = eliminarProducto($conexion, $idc, $idp);
    echo $resultado;
}


//funcion para crear un pedido
function newPedido()
{
    $conexion = conectar();
    $idc = $_POST['idc'];
    date_default_timezone_set("America/Lima");
    $fechad = getdate();
    $fecha = $fechad['year'] . "-" . $fechad['mon'] . "-" . $fechad['mday'];
    $vlat = $_POST['vlat'];
    $vlng = $_POST['vlng'];


    echo crearVenta($conexion, $idc, $fecha, $vlat, $vlng);

}






if (function_exists($_GET['f'])) {
    $_GET['f'](); //llama la función si es que existe
}
?>