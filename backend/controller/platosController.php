<?php
include_once "../model/platosModel.php";
include_once "../../inc/conexion.php";


function showPlatosCliente()
{
    $conexion = conectar();
    $resultado = listarPlatos($conexion);

    //almacenar los datos de la consulta en un nuevo array
    $datos = array();
    while ($fila = $resultado->fetch_assoc()) {
        $datos[] = $fila;
    }

    //crea una seccion para cada categoria y la volvemos en una funcion dinamica
    function cargaPlatos($categoria, $datos, $identificador)
    {
?>

        <section id="<?php echo $identificador ?>">
            <h3 class="mt-3"><?php echo $categoria ?></h3>
            <?php

            //funcion para filtrar los datos por categoria
            $datosFiltrados = array_filter($datos, function ($dato) use ($categoria) {
                return $dato['categoria'] == $categoria;
            });
            ?>
            <div class="row">
                <?php
                //recorremos el array filtrado
                foreach ($datosFiltrados as $dato) {
                    $datos = $dato['id'] . "||" .
                        $dato['nombre'] . "||" .
                        $dato['precio'] . "||" .
                        $dato['imagen'] . "||" .
                        $dato['descripcion'] . "||" .
                        $dato['categoria'];
                ?>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
                        <div class="container bg-white redondear">
                            <div class="row">
                                <div class="col-4 pe-0 ps-0" onclick="llenarDatos('<?php echo $datos ?>')" data-bs-toggle="modal" data-bs-target="#detalle">
                                    <img class="imagen" src="../<?php echo $dato['imagen'] ?>" alt="bebida">
                                </div>
                                <div class="col-8 pt-2 align-items-center text-dark">
                                    <label class="text-truncate w-100"><?php echo $dato['nombre'] ?></label><br>
                                    <label for="">★★★★★</label>
                                    <div class="row">
                                        <div class="col-8">
                                            <span>
                                                <span class="material-symbols-outlined">shopping_bag</span>
                                                <label for="" class="fs-8">100</label>
                                            </span>
                                            <span>
                                                <span class="material-symbols-outlined">thumb_up</span>
                                                <label for="" class="fs-8">100</label>
                                            </span>
                                        </div>
                                        <div class="col-4 text-end">
                                        <button class="btn bg-rosa text-light"><i class='bx bx-cart-add'></i></button>
                                        </div>
                                    </div>
                                    <label for="" class="text-precio fw-bold">S/ <?php echo $dato['precio'] ?></label>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </section>
    <?php
    }

    //llamamos a la funcion para cada categoria y pasamos los parametros
    cargaPlatos("Bebidas", $datos, "bebidas");
    cargaPlatos("Comida", $datos, "comida");
    cargaPlatos("Postre", $datos, "postre");
    cargaPlatos("Snacks", $datos, "snacks");
    cargaPlatos("Hamburguesas", $datos, "hamburguesas");
    cargaPlatos("Pizza", $datos, "pizza");
    cargaPlatos("Parrillas", $datos, "parrillas");
    cargaPlatos("Caldo", $datos, "caldo");
    ?>
<?php

}



if (function_exists($_GET['f'])) {
    $_GET['f'](); //llama la función si es que existe
}
?>