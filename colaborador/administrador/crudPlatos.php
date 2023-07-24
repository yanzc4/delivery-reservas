<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Agregar Platos</title>
    <style>
        :root {
            --color-primary: #7380ec;
            --color-danger: #F97777;
            --color-success: #00d1b2;
            --color-warning: #ffdd57;
            --color-white: #ffffff;
            --color-info-dark: #7d8da1;
            --color-info-light: #dce1eb;
            --color-dark: #363949;
            --color-light: rgba(132, 139, 200, 0.18);
            --color-primary-variant: #111e88;
            --color-dark-variant: #677483;
            --color-background: #F7F7F7;

            --card-border-radius: 2rem;
            --border-radius-1: 0.4rem;
            --border-radius-2: 0.8rem;
            --border-radius-3: 1.2rem;

            --card-padding: 1.8rem;
            --padding-1: 1.2rem;

            --box-shadow-1: 0 2rem 3rem var(--color-light);
        }

        /*Variables para el tema oscuro*/
        .dark-theme-variables {
            --color-background: #181a1e;
            --color-white: #202528;
            --color-dark: #edeffd;
            --color-dark-variant: #a3dbcc;
            --color-light: rgba(0, 0, 0, 0.4);
            --color-shadow: 0 2rem 3rem var(--color-light);
        }

        main {
            width: 100%;
            padding-top: 1rem;
            padding-left: 2rem;
            padding-right: 2rem;
        }

        body {
            font-family: poppins, sans-serif;
            background: var(--color-background);
            color: var(--color-dark);
        }

        .form-submit-btn input {
            width: 100%;
            margin-top: 10px;
            font-size: 20px;
            padding: 10px;
            border: 2px dashed #7380ec;
            border-radius: 3px;
            color: rgb(209, 209, 209);
            background-color: transparent;
            transition: 0.3s;
        }

        .form-submit-btn input:hover {
            background: #7380ec;
            color: rgb(255, 255, 255);
        }

        .bg-tabla {
            background: var(--color-white);
            box-shadow: var(--box-shadow-1);
            color: var(--color-dark-variant);
        }

        .tb-tabla {
            border-bottom: 1px solid var(--color-light);
            color: var(--color-dark-variant);
        }

        .bg-modal {
            background: var(--color-background);
            color: var(--color-dark-variant);
        }

        .text-success {
            color: #F97777 !important;
        }

        .btn-transparente {
            border: none;
            background-color: transparent;
        }

        .btn-login {
            background: #F97777 !important;
            color: #fff;
        }

        .btn-login:hover {
            background: #F97777 !important;
            color: #fff;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .cuerpo {
            width: 100%;
            height: 32vh;
            overflow-y: scroll;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .cuerpo::-webkit-scrollbar {
            width: 3px;
            border-radius: 25px;
        }

        .cuerpo::-webkit-scrollbar-track {
            background: #fff;
        }

        .cuerpo::-webkit-scrollbar-thumb {
            background: #F97777;
        }

        .cuerpo::-webkit-scrollbar-thumb:hover {
            background: #F97777;
        }

        @media screen and (max-width: 720px) {
            main {
                width: 100%;
                padding-top: 0;
                padding-left: 0;
                padding-right: 0;
            }
        }
    </style>
</head>

<body>
    <main>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-3">
                <div class="container">
                    <h2 class="pb-2">Registrar Platos</h2>
                    <form method="post" id="frmRegistrarPlato">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="txtNombre">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Precio</label>
                                <input type="number" step="0.1" class="form-control" name="txtPrecio" id="">
                            </div>
                        </div>


                        <label class="form-label">Imagen</label>
                        <input type="file" class="form-control" name="txtImg" id="">

                        <div class="mt-2">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class="form-label pt-2">Categoria</label>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop-a"><i class='bx bx-add-to-queue'></i></button>
                                    </div>
                                </div>
                            </div>
                            <div id="combo"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button id="btnRegistrarPlato" class="btn btn-success w-100">Agregar</button>
                            </div>
                    </form>
                    <div class="col-6">
                        <button type="reset" class="btn btn-danger w-100">Borrar</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-3">
            <div class="container">
                <h2 class="pb-1">Platos</h2>
                <table class="table bg-tabla">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Ajustes</th>
                        </tr>
                    </thead>
                    <tbody id="tablaPlatosAdmin">
                    </tbody>
                </table>
            </div>

        </div>
        </div>
    </main>

    <!-- MODAL QUE HABRE PARA AGREGAR CATEGORIAS -->
    <div class="modal fade" id="staticBackdrop-a" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-modal">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="staticBackdropLabel">Agregar Categoria</h5>
                    <button type="button" class="text-success btn-transparente" data-bs-dismiss="modal" aria-label="Close"><i class='bx bx-x fs-2'></i></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmAgregarCategoria">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input class="form-control" type="text" name="txtNombreCategoria" id="" placeholder="Nombre de la categoria" required>
                        </div>
                        <button class="btn btn-success mb-3 w-100" id="btnAgregarCategoria">Agregar</button>
                    </form>
                    <div class="container cuerpo">
                    <div class="container" id="tablaCategorias"></div>                     
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DE EDITAR EL PRODUCTO -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-modal">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="staticBackdropLabel " style="color: black;">Editar Plato</h5>
                    <button type="button" class="text-success btn-transparente" data-bs-dismiss="modal" aria-label="Close"><i class='bx bx-x fs-2'></i></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmEditarPlato">
                        <div class="row">
                        
                            <div class="col-6">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="txtNombre">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Precio</label>
                                <input type="number" step="0.1" class="form-control" name="txtPrecio" id="">
                            </div>
                        </div>

                        <label class="form-label pt-2">Imagen</label>
                        <input type="file" class="form-control" name="txtImg" id="">
                        <label class="form-label pt-2">Categoria</label>


                        <select class="form-select" name="lsCategoria">
                            <option value="">Combo</option>
                            <option value="">Bebida</option>
                            <option value="">Especiales</option>
                            <option value="">Salchipapas</option>
                        </select>

                        <button id="btnEditarPlato" class="btn btn-login w-100 mt-3 mb-2">Actualizar</button>

                    </form>


                </div>
            </div>
        </div>
    </div>

    <!-- MODAL QUE Habre para editar la categoria -->
    <div class="modal fade" id="staticBackdrop-c" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel ">Editar Categoria</h5>
                    <button type="button" class="text-success btn-transparente" data-bs-dismiss="modal" aria-label="Close"><i class='bx bx-x fs-2'></i></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmEditarCategoria">
                    <input class="form-control" type="hidden" id="etxtId" name="etxtId" />
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input class="form-control" type="text" name="etxtNombreCategoria" id="etxtNombreCategoria" placeholder="Nombre de la categoria" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100 mb-2" id="btnEditarCategoria">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../../assets/js/administrador/activarModoOscuro.js"></script>
    <script src="../../assets/js/administrador/crudCategorias.js"></script>
</body>

</html>