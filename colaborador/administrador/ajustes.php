<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        @media screen and (max-width: 768px) {
            main {
                width: 100%;
                padding-top: 0;
                padding-left: 0;
                padding-right: 0;
            }
        }
    </style>
    <title>Ajustes</title>
</head>

<body>
    <main>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="container">
                    <h3 class="pb-2">Registrar Empleado</h3>
                    <form method="post" id="frmRegistrarEmpleado">
                        <div class="row mb-2">
                            <div class="col-6">
                                <label>Nombre:</label>
                                <input class="form-control" type="text" name="aNombre" />
                            </div>
                            <div class="col-6">
                                <label>Email</label>
                                <input class="form-control" type="email" name="aEmail" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="w-100 text-truncate">Numero de Telefono</label>
                                <input class="form-control" type="number" id="celular" name="aCelular" />
                            </div>
                            <div class="col-6">
                                <label class="w-100 text-truncate">Fecha de Nacimiento</label>
                                <input class="form-control" type="date" name="aNacimiento" />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label>Direccion</label>
                            <input class="form-control" type="text" name="aDireccion" />
                        </div>

                        <div class="row mb-2">
                            <div class="col-6">
                                <label>Usuario</label>
                                <input class="form-control" type="text" name="aUser" />
                            </div>
                            <div class="col-6">
                                <label>Password</label>
                                <input class="form-control" type="password" name="aPass" />
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="">Cargo</label>
                            <select class="form-select" name="aCargo" id="">
                                <option value="Administrador">Administrador</option>
                                <option value="Delivery">Delivery</option>
                                <option value="Monitoreo">Monitoreo</option>
                            </select>
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-login w-100" name="btnRegistrarEmpleado" id="btnRegistrarEmpleado">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                <input onkeyup="buscar_ahora($('#buscar_1').val());" type="text" class="form-control bg-transparent text-azul-medio" id="buscar_1" name="buscar_1" placeholder="Buscar cliente">
                <div class="container mt-3" id="tablaUsuario">

                </div>
            </div>
    </main>

    <!-- MODAL CON BOOSTRAP  -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-modal">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="staticBackdropLabel">Editar Empleado</h5>
                    <button type="button" class="text-success btn-transparente" data-bs-dismiss="modal" aria-label="Close"><i class='bx bx-x fs-2'></i></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmActualizarEmpleado">
                        <div class="row mb-2">
                            
                                <input class="form-control" type="hidden" id="id" name="txtId" />
                         
                            <div class="col-6">
                                <label>Nombre:</label>
                                <input class="form-control" type="text" id="nombre" name="txtNombre" />
                            </div>
                            <div class="col-6">
                                <label>Email</label>
                                <input class="form-control" type="email" id="email" name="email" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="w-100 text-truncate">Numero de Telefono</label>
                                <input class="form-control" type="number" id="phoneNumber" name="phoneNumber" />
                            </div>
                            <div class="col-6">
                                <label class="w-100 text-truncate">Fecha de Nacimiento</label>
                                <input class="form-control" type="date" id="fecha_nacimiento" name="txtFechaNacimineto" />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label>Direccion</label>
                            <input class="form-control" type="text" id="direccion" name="txtDireccion" />
                        </div>

                        <div class="row mb-2">
                            <div class="col-6">
                                <label>Usuario</label>
                                <input class="form-control" type="text" id="user" name="txtUser" />
                            </div>
                            <div class="col-6">
                                <label>Password</label>
                                <input class="form-control" type="password" id="password" name="password" />
                            </div>
                        </div>

                        <button class="btn btn-login w-100 mt-2" id="btnActualizarEmpleado">Actualizar</button>
                    </form>
                    <!-- <button id="btn-cerrar-modal" class="btn btn-danger">Cerrar</button> -->

                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../../assets/js/administrador/activarModoOscuro.js"></script>
    <script src="../../assets/js/administrador/crudUsuarios.js"></script>
    <script>
        var input = document.getElementById('celular');
        var input2 = document.getElementById('phoneNumber');
        input.addEventListener('input', function() {
            if (this.value.length > 9)
                this.value = this.value.slice(0, 9);
        })
        input2.addEventListener('input', function() {
            if (this.value.length > 9)
                this.value = this.value.slice(0, 9);
        })
    </script>
</body>

</html>