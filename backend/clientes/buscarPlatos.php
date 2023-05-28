<section id="bebidas">
    <h3 class="mt-3">Bebidas</h3>
    <div class="row">
        <?php
        $plato = "Jugo de piña";
        $img = "../assets/img/bebidas.png";
        $descripcion = "Jugo de piña con hielo";
        $precio = "5.00";
        for ($i = 1; $i <= 8; $i++) {
        ?>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
                <div class="container bg-white redondear">
                    <div class="row">
                        <div class="col-4 pe-0 ps-0" data-bs-toggle="modal" data-bs-target="#detalle">
                            <img class="imagen" src="<?php echo $img ?>" alt="bebida">
                        </div>
                        <div class="col-8 pt-2 align-items-center text-dark">
                            <label class="text-truncate" data-bs-toggle="modal" data-bs-target="#detalle"><?php echo $plato ?></label><br>
                            <label for="">★★★★★</label><br>
                            <span>
                                <span class="material-symbols-outlined">shopping_bag</span>
                                <label for="" class="fs-8">100</label>
                            </span>
                            <span>
                                <span class="material-symbols-outlined">thumb_up</span>
                                <label for="" class="fs-8">100</label>
                            </span>
                            <br>
                            <label for="" class="text-precio fw-bold">S/ <?php echo $precio ?></label>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>

<section id="comida">
    <h3 class="mt-3">Comida</h3>
    <div class="row">
        <?php
        for ($i = 1; $i <= 8; $i++) {
        ?>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
                <div class="container bg-white redondear">
                    <div class="row">
                        <div class="col-4 pe-0 ps-0">
                            <img class="imagen" src="../assets/img/arroz.webp" alt="bebida">
                        </div>
                        <div class="col-8 pt-2 align-items-center text-dark">
                            <label class="text-truncate">Arroz blanco</label><br>
                            <label for="">★★★★★</label><br>
                            <span>
                                <span class="material-symbols-outlined">shopping_bag</span>
                                <label for="" class="fs-8">100</label>
                            </span>
                            <span>
                                <span class="material-symbols-outlined">thumb_up</span>
                                <label for="" class="fs-8">100</label>
                            </span>
                            <br>
                            <label for="" class="text-rosa fw-bold">S/ 7.00</label>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>

<section id="postre">
    <h3 class="mt-3">Postres</h3>
    <div class="row">
        <?php
        for ($i = 1; $i <= 8; $i++) {
        ?>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
                <div class="container bg-white redondear">
                    <div class="row">
                        <div class="col-4 pe-0 ps-0">
                            <img class="imagen" src="../assets/img/cupcake.png" alt="bebida">
                        </div>
                        <div class="col-8 pt-2 align-items-center text-dark">
                            <label class="text-truncate">Cupcake de chocolate</label><br>
                            <label for="">★★★★★</label><br>
                            <span>
                                <span class="material-symbols-outlined">shopping_bag</span>
                                <label for="" class="fs-8">100</label>
                            </span>
                            <span>
                                <span class="material-symbols-outlined">thumb_up</span>
                                <label for="" class="fs-8">100</label>
                            </span>
                            <br>
                            <label for="" class="text-rosa fw-bold">S/ 5.00</label>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>

<section id="snacks">
    <h3 class="mt-3">Snacks</h3>
    <div class="row">
        <?php
        for ($i = 1; $i <= 8; $i++) {
        ?>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
                <div class="container bg-white redondear">
                    <div class="row">
                        <div class="col-4 pe-0 ps-0">
                            <img class="imagen" src="../assets/img/papas.png" alt="bebida">
                        </div>
                        <div class="col-8 pt-2 align-items-center text-dark">
                            <label class="text-truncate">Papas fritas</label><br>
                            <label for="">★★★★★</label><br>
                            <span>
                                <span class="material-symbols-outlined">shopping_bag</span>
                                <label for="" class="fs-8">100</label>
                            </span>
                            <span>
                                <span class="material-symbols-outlined">thumb_up</span>
                                <label for="" class="fs-8">100</label>
                            </span>
                            <br>
                            <label for="" class="text-rosa fw-bold">S/ 5.40</label>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>

<section id="hamburguesas">
    <h3 class="mt-3">Hamburguesas</h3>
    <div class="row">
        <?php
        for ($i = 1; $i <= 8; $i++) {
        ?>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
                <div class="container bg-white redondear">
                    <div class="row">
                        <div class="col-4 pe-0 ps-0">
                            <img class="imagen" src="../assets/img/hamburguesa.webp" alt="bebida">
                        </div>
                        <div class="col-8 pt-2 align-items-center text-dark">
                            <label class="text-truncate">Hamburguesa de Pollo</label><br>
                            <label for="">★★★★★</label><br>
                            <span>
                                <span class="material-symbols-outlined">shopping_bag</span>
                                <label for="" class="fs-8">100</label>
                            </span>
                            <span>
                                <span class="material-symbols-outlined">thumb_up</span>
                                <label for="" class="fs-8">100</label>
                            </span>
                            <br>
                            <label for="" class="text-rosa fw-bold">S/ 5.90</label>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>

<section id="pizza">
    <h3 class="mt-3">Pizzas</h3>
    <div class="row">
        <?php
        for ($i = 1; $i <= 8; $i++) {
        ?>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
                <div class="container bg-white redondear">
                    <div class="row">
                        <div class="col-4 pe-0 ps-0">
                            <img class="imagen" src="../assets/img/pizza.webp" alt="bebida">
                        </div>
                        <div class="col-8 pt-2 align-items-center text-dark">
                            <label class="text-truncate">Pizza de Peperoni</label><br>
                            <label for="">★★★★★</label><br>
                            <span>
                                <span class="material-symbols-outlined">shopping_bag</span>
                                <label for="" class="fs-8">100</label>
                            </span>
                            <span>
                                <span class="material-symbols-outlined">thumb_up</span>
                                <label for="" class="fs-8">100</label>
                            </span>
                            <br>
                            <label for="" class="text-rosa fw-bold">S/ 24.00</label>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>

<section id="parrillas">
    <h3 class="mt-3">Parrillas</h3>
    <div class="row">
        <?php
        for ($i = 1; $i <= 8; $i++) {
        ?>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
                <div class="container bg-white redondear">
                    <div class="row">
                        <div class="col-4 pe-0 ps-0">
                            <img class="imagen" src="../assets/img/anticucho.jpg" alt="bebida">
                        </div>
                        <div class="col-8 pt-2 align-items-center text-dark">
                            <label class="text-truncate">Anticuchos</label><br>
                            <label for="">★★★★★</label><br>
                            <span>
                                <span class="material-symbols-outlined">shopping_bag</span>
                                <label for="" class="fs-8">100</label>
                            </span>
                            <span>
                                <span class="material-symbols-outlined">thumb_up</span>
                                <label for="" class="fs-8">100</label>
                            </span>
                            <br>
                            <label for="" class="text-rosa fw-bold">S/ 28.90</label>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>

<section id="caldo">
    <h3 class="mt-3">Caldo</h3>
    <div class="row">
        <?php
        for ($i = 1; $i <= 8; $i++) {
        ?>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
                <div class="container bg-white redondear">
                    <div class="row">
                        <div class="col-4 pe-0 ps-0">
                            <img class="imagen" src="../assets/img/caldo.webp" alt="bebida">
                        </div>
                        <div class="col-8 pt-2 align-items-center text-dark">
                            <label class="text-truncate">Sancochado</label><br>
                            <label for="">★★★★★</label><br>
                            <span>
                                <span class="material-symbols-outlined">shopping_bag</span>
                                <label for="" class="fs-8">100</label>
                            </span>
                            <span>
                                <span class="material-symbols-outlined">thumb_up</span>
                                <label for="" class="fs-8">100</label>
                            </span>
                            <br>
                            <label for="" class="text-rosa fw-bold">S/ 10.00</label>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>

<!-- modal -->
<div class="modal fade" id="detalle">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <button type="button" class="text-rosa btn-transparente" data-bs-dismiss="modal" aria-label="Close">
                    <span class="material-symbols-outlined">arrow_back_ios</span>
                </button>
                <div class="container text-end">
                    <button type="button" class="text-rosa btn-transparente">
                        <span class="material-symbols-outlined">favorite</span>
                    </button>
                </div>
                <div>
                    <button type="button" class="text-rosa btn-transparente">
                        <span class="material-symbols-outlined">share</span>
                    </button>
                </div>
            </div>
            <div class="modal-body p-0">
                <div class="text-center container bg-dark">
                    <img class="detalleImagen" src="<?php echo $img ?>" alt="">
                </div>
                <div class="container p-3">
                    <span class="form-label text-dark"><?php echo $plato ?></span>
                </div>

            </div>
        </div>
    </div>
</div>