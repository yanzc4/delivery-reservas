<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
    </style>
    <title>Ajustes</title>
</head>

<body>
    <main>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="container">
                    <h3 class="pb-2">Registrar Empleado</h3>
                    <form action="#" method="post">
                        <div class="row mb-2">
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
                                <input class="form-control" type="text" id="phoneNumber" name="phoneNumber" />
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

                        <div class="mb-2">
                            <label for="">Cargo</label>
                            <select class="form-select" name="chkCargo" id="">
                                <option value="Admin">administrador</option>
                                <option value="Empleado">empleado</option>
                            </select>
                        </div>

                        <div class="form-submit-btn">
                            <input type="submit" value="Registrar">
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="container">
                    <table class="table bg-tabla">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Direcion</th>
                                <th>Cambios</th>
                            </tr>
                        </thead>
                        <tbody class="tb-tabla">
                            <tr>
                                <th scope="row">1</th>
                                <td>Saul</td>
                                <td>Otto</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bx-edit-alt'></i></button>

                                    <!-- <button type="button" class="btn btn-warning " id="btn-abrir-modal">Cambiar</button> -->
                                    <button type="button" class="btn btn-danger"><i class='bx bx-trash-alt'></i></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bx-edit-alt'></i></button>
                                    <button type="button" class="btn btn-danger"><i class='bx bx-trash-alt'></i></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry the Bird</td>
                                <td>Trujillos</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bx-edit-alt'></i></button>
                                    <button type="button" class="btn btn-danger"><i class='bx bx-trash-alt'></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- MODAL CON BOOSTRAP  -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel " style="color: black;">Editar Empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 style="color: black;">Editar</h2>
                    <form action="#">
                        <div class="main-usuario-info">
                            <div class="user-input-box">
                                <label>Nombre:</label>
                                <input type="text" id="nombre" name="txtNombre" />
                            </div>
                            <div class="user-input-box">
                                <label>Email</label>
                                <input type="email" id="email" name="email" />
                            </div>
                            <div class="user-input-box">
                                <label>Direccion</label>
                                <input type="text" id="direccion" name="txtDireccion" />
                            </div>
                            <div class="user-input-box">
                                <label>Numero de Telefono</label>
                                <input type="text" id="phoneNumber" name="phoneNumber" />
                            </div>
                            <div class="user-input-box">
                                <label>Fecha de Nacimiento</label>
                                <input type="date" id="fecha_nacimiento" name="txtFechaNacimineto" />
                            </div>
                            <div class="user-input-box">
                                <label>User</label>
                                <input type="text" id="user" name="txtUser" />
                            </div>
                            <div class="user-input-box">
                                <label>Password</label>
                                <input type="password" id="password" name="password" />
                            </div>
                        </div>
                        <div class="cargo-details-box">
                            <span class="cargo-title">Cargo</span>
                            <div class="cargo-category">
                                <select class="form-select" name="chkCargo" id="">
                                    <option value="Admin">administrador</option>
                                    <option value="Empleado">empleado</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-submit-btn">
                            <input type="submit" value="Registrar">
                        </div>
                    </form>
                    <!-- <button id="btn-cerrar-modal" class="btn btn-danger">Cerrar</button> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <!-- <button type="button" class="btn btn-primary">Aceptar</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Este modal es el que creo yo el de arriba es con boostrap decide cual vas a usar  -->

    <!-- <dialog id="modal" class="position-absolute top-50 start-50 translate-middle rounded-top p-2 bg-light border    ">
        <h2>Editar</h2>
        <form action="#">
            <div class="main-usuario-info">
                <div class="user-input-box">
                    <label>Nombre:</label>
                    <input type="text" id="nombre" name="txtNombre" />
                </div>
                <div class="user-input-box">
                    <label>Email</label>
                    <input type="email" id="email" name="email" />
                </div>
                <div class="user-input-box">
                    <label>Direccion</label>
                    <input type="text" id="direccion" name="txtDireccion" />
                </div>
                <div class="user-input-box">
                    <label>Numero de Telefono</label>
                    <input type="text" id="phoneNumber" name="phoneNumber" />
                </div>
                <div class="user-input-box">
                    <label>Fecha de Nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="txtFechaNacimineto" />
                </div>
                <div class="user-input-box">
                    <label>User</label>
                    <input type="text" id="user" name="txtUser" />
                </div>
                <div class="user-input-box">
                    <label>Password</label>
                    <input type="password" id="password" name="password" />
                </div>
            </div>
            <div class="cargo-details-box">
                <span class="cargo-title">Cargo</span>
                <div class="cargo-category">
                    <select name="chkCargo" id="">
                        <option value="Admin">administrador</option>
                        <option value="Empleado">empleado</option>
                    </select>
                </div>
            </div>
            <div class="form-submit-btn">
                <input type="submit" value="Registrar">
            </div>
        </form>
        <button id="btn-cerrar-modal" class="btn btn-danger">Cerrar</button>
    </dialog> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../../assets/js/administrador/activarModoOscuro.js"></script>
</body>

</html>