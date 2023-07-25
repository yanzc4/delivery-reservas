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
                                    <img class="img3" src="../<?php echo $dato['imagen'] ?>" alt="bebida">
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
                                            <button onclick="agregarProducto(<?php echo $dato['id'] ?>, <?php echo $dato['precio'] ?>)" class="btn bg-rosa text-light"><i class='bx bx-cart-add'></i></button>
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

function showPlatosSlider()
{
    $conexion = conectar();
    $resultado = llenarSlider($conexion);

    while ($fila = $resultado->fetch_assoc()) {
    ?>
        <div class="swiper-slide tarjeta redondear bg-b">
            <div class="container text-center">
                <img class="img3" src="../<?php echo $fila['imagen'] ?>" alt="">
                <hr>
                <div>
                    <label class="fw-bold text-start" for="">S./ <?php echo $fila['precio'] ?></label>
                    <label class="text-success fs-8 text-start" for="">22% OFF</label>
                </div>
                <div>
                    <label class="text-success text-start" for="">ENVIO GRATIS</label>
                </div>
                <div>
                    <p class="f-texto2 text-start"><?php echo $fila['descripcion'] ?></p>
                </div>
            </div>
        </div>
    <?php
    }
}

function showPlatosBanner()
{
    $conexion = conectar();
    $resultado = llenarBanner($conexion);

    while ($fila = $resultado->fetch_assoc()) {
    ?>
        <div class="swiper-slide">
            <img class="imagen2" src="../<?php echo $fila['imagen'] ?>" alt="">
        </div>
    <?php
    }
}

function showOfertas()
{
    $conexion = conectar();
    $resultado = llenarOfertas($conexion);

    while ($fila = $resultado->fetch_assoc()) {
    ?>
        <div class="container mb-3">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <img src="../<?php echo $fila['imagen'] ?>" class="img-card" alt="">
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 bg-black text-container">
                    <div class="p-3">
                        <p>OFERTAS DEL DIA</p>
                        <h3 class="text-wrap w-75">APROVECHA LAS MEJORES OFERTAS</h3>
                        <a href="platos.php" target="myFrame">Ver Más ...</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}


//para llenar los slider dinamicamente desde el index
function showPlatosSlider2()
{
    $conexion = conectar();
    $resultado = llenarSlider($conexion);

    while ($fila = $resultado->fetch_assoc()) {
    ?>
        <div class="swiper-slide tarjeta redondear bg-b">
            <div class="container text-center">
                <img class="img-card" src="<?php echo $fila['imagen'] ?>" alt="">
                <hr>
                <div>
                    <label class="fw-bold text-start" for="">S./ <?php echo $fila['precio'] ?></label>
                    <label class="text-success fs-8 text-start" for="">22% OFF</label>
                </div>
                <div>
                    <label class="text-success text-start" for="">ENVIO GRATIS</label>
                </div>
                <div>
                    <p class="f-texto2 text-start"><?php echo $fila['descripcion'] ?></p>
                </div>
            </div>
        </div>
    <?php
    }
}

function showPlatosBanner2()
{
    $conexion = conectar();
    $resultado = llenarBanner($conexion);

    while ($fila = $resultado->fetch_assoc()) {
    ?>
        <div class="swiper-slide">
            <img class="imagen2" src="<?php echo $fila['imagen'] ?>" alt="">
        </div>
    <?php
    }
}

function showOfertas2()
{
    $conexion = conectar();
    $resultado = llenarOfertas($conexion);

    while ($fila = $resultado->fetch_assoc()) {
    ?>
        <div class="container mb-3">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <img src="<?php echo $fila['imagen'] ?>" class="img3" alt="">
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 bg-black text-container">
                    <div class="p-3">
                        <p>OFERTAS DEL DIA</p>
                        <h3 class="text-wrap w-75">APROVECHA LAS MEJORES OFERTAS</h3>
                        <a href="platos.php" target="myFrame">Ver Más ...</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}

function showPlatosAdmin()
{
    $conexion = conectar();
    $resultado = listarPlatos($conexion);

    while ($fila = $resultado->fetch_assoc()) {
        $datos = $fila['id'] . "||" .
            $fila['nombre'] . "||" .
            $fila['precio'] . "||" .
            $fila['imagen'] . "||" .
            $fila['descripcion'] . "||" .
            $fila['categoria'];
    ?>
        <tr class="">
            <td scope="row"><?php echo $fila['id'] ?></td>
            <td><?php echo $fila['nombre'] ?></td>
            <td>S/ <?php echo $fila['precio'] ?></td>
            <td>

                <button onclick="llenarModalPlatos('<?php echo $datos ?>');" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bx-edit-alt'></i></button>

                <button onclick="eliminacionPlatoAdmin(<?php echo $fila['id'] ?>)" class="btn btn-danger"><i class='bx bx-trash'></i></button>

            </td>
        </tr>
<?php
    }
}

function addPlatoAdmin()
{
    $conexion = conectar();

    if (!empty($_POST['nomPlato']) && !empty($_POST['plaPrecio']) && !empty($_POST['plaDesc']) && !empty($_POST['lsCategoria']) && !empty($_FILES['plaImagen']['name'])) {
        $imagen = $_FILES['plaImagen']['name'];
        $ruta = $_FILES['plaImagen']['tmp_name'];
        $destino = "../../database/img/" . $imagen;
        copy($ruta, $destino);

        $destinodb = "database/img/" . $imagen;
        $datos = array(
            "nombre" => $_POST['nomPlato'],
            "precio" => $_POST['plaPrecio'],
            "descripcion" => $_POST['plaDesc'],
            "id_categoria" => $_POST['lsCategoria']
        );
        agregarPlatosAdmin($conexion, $datos, $destinodb);
        echo 1;
    } else {
        echo 0;
    }
}

function editPlatosAdmin(){
    $conexion = conectar();
    $datos = array(
        "id" => $_POST['ide'],
        "nombre" => $_POST['txtNombre'],
        "precio" => $_POST['txtPrecio'],
        "descripcion" => $_POST['myarea']
    );
    echo editarPlatoAdmin($conexion, $datos);
}

function deletePlatosAdmin(){
    $conexion = conectar();
    $id = $_POST['id'];
    echo eliminarPlatoAdmin($conexion, $id);
}

if (function_exists($_GET['f'])) {
    $_GET['f'](); //llama la función si es que existe
}
?>