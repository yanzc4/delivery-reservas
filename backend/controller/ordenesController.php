<?php
include_once "../model/ordenesModel.php";
include_once "../../inc/conexion.php";

function showOrdenes()
{
    $conexion = conectar();
    $resultado = listarOrdenes($conexion);
?>
    <?php
    while ($fila = $resultado->fetch_assoc()) {
        if ($fila['id_trabajador'] == null) {
            $datos = $fila['id_cliente'] . "||" .
            $fila['id_pedido'];
    ?>
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-3">
            <div class="container bg-modal sombra redondear p-3">
                <div>
                    <label for="" class="fs-8">Cliente</label>
                </div>
                <div>
                    <label for="" class="form-label"><i class='bx bx-user'></i> <?php echo $fila['nombre'] . " " . $fila['apellido'] ?></label>
                </div>
                <div>
                    <label for="" class="fs-8">Celular</label>
                </div>
                <div>
                    <label for="" class="form-label"><i class='bx bx-phone'></i> <?php echo $fila['telefono'] ?></label>
                </div>
                <div>
                    <label for="" class="fs-8">Total</label>
                </div>
                <div>
                    <label for="" class="form-label text-rosa"><i class='bx bx-credit-card'></i> S./ <?php echo $fila['total'] ?></label>
                </div>
                <hr>
                <div>
                    <label for="" class="fs-8">Dirección</label>
                </div>
                <div>
                    <label for="" class="form-label"><i class='bx bx-map'></i> <?php echo $fila['direccion'] ?></label>
                </div>
                <div class="mt-2">
                    <label for="" class="form-label text-rosa"><i class='bx bx-trip'></i> Asiganar Repartidor</label>
                </div>
                <hr>
                <div class="text-center">
                    <label for="" class="fs-8 mb-2">Aprox: <label for="" class="text-rosa">..km</label></label>
                    <div class="row">
                        <div class="col-12">
                            <button onclick="llenarDatos('<?php echo $datos ?>')" data-bs-toggle="modal" data-bs-target="#asiganartrabajador" class="btn btn-secundario w-100"><i class='bx bx-check'></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
<?php
        }
    }
}


function showOrdenes2()
{
    $conexion = conectar();
    $id = $_POST['id'];
    $resultado = listarOrdenes($conexion);
?>
    <?php
    while ($fila = $resultado->fetch_assoc()) {
        if ($fila['id_trabajador'] == $id) {
            $datos = $fila['id_cliente'] . "||" .
            $fila['id_pedido'];
    ?>
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-3">
                    <div class="container bg-modal sombra redondear p-3">
                        <div>
                            <label for="" class="fs-8">Cliente</label>
                        </div>
                        <div>
                            <label for="" class="form-label"><i class='bx bx-user'></i> <?php echo $fila['nombre']." ".$fila['apellido'] ?></label>
                        </div>
                        <div>
                            <label for="" class="fs-8">Celular</label>
                        </div>
                        <div>
                            <label for="" class="form-label"><i class='bx bx-phone'></i> <?php echo $fila['telefono'] ?></label>
                        </div>
                        <div>
                            <label for="" class="fs-8">Total</label>
                        </div>
                        <div>
                            <label for="" class="form-label text-rosa"><i class='bx bx-credit-card'></i> S./ <?php echo $fila['total'] ?></label>
                        </div>
                        <hr>
                        <div>
                            <label for="" class="fs-8">Dirección</label>
                        </div>
                        <div>
                            <label for="" class="form-label"><i class='bx bx-map'></i> <?php echo $fila['direccion'] ?></label>
                        </div>
                        <hr>
                        <div class="text-center">
                            <label for="" class="fs-8 mb-2">Aprox: <label for="" class="text-rosa">.km</label></label>
                            <button onclick="entregarPedido(<?php echo $fila['id_pedido'] ?>)" class="btn btn-secundario w-100"><i class='bx bx-check'></i> Entregado</button>
                        </div>
                    </div>
                </div>
<?php
        }
    }
}


function newEntrega(){
    $conexion = conectar();
    $idp = $_POST['idp'];
    echo crearOrdenEntregada($conexion, $idp);
}



function asignandoRepartidor(){
    $conexion = conectar();
    $datos = array(
        'id_cliente' => $_POST['idc'],
        'id_pedido' => $_POST['idpe'],
        'id_trabajador' => $_POST['cboDelivery']
    );
    echo asignarRepartidor($conexion, $datos);
}

if (function_exists($_GET['f'])) {
    $_GET['f'](); //llama la función si es que existe
}

?>