<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Ajustes</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                <form method="post" id="frmPrueba">
                    <h2 class="text-center">Ingresar Prueba</h2>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular</label>
                        <input type="text" maxlength="9" class="form-control" name="cel">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">DNI</label>
                        <input type="text" maxlength="8" class="form-control" name="dni">
                    </div>
                    <button class="btn btn-primary w-100" id="btnEnviar">Enviar</button>
                </form>
            </div>
            <div id="buscador" class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                <div class="container">
                    <h3 class="pt-2 fw-bold">Ventas</h3>
                    <div class="d-flex mt-2">
                        <div class="col">
                            <input onkeyup="buscar_ahora($('#buscar_1').val());" type="text" class="form-control bg-transparent text-azul-medio" id="buscar_1" name="buscar_1" placeholder="Buscar cliente">
                        </div>
                        <div class="col-auto ms-2">
                            <a class="btn btn-celeste-bajo">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="container p-0 mt-3" id="datos_buscador">

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar Empleado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="frmActualizar" method="POST">
                            <div>
                                <label>Id</label>
                                <input type="text" class="form-control w-25" id="ide" name="ide" value="" readonly="readonly">
                            </div>
                            <div>
                                <label>Nombre</label>
                                <input type="text" class="form-control w-25" id="enombre" name="enombre" value="">
                            </div>
                            <div>
                                <label>Cel</label>
                                <input type="text" maxlength="9" class="form-control w-auto" name="ecel" id="ecel">
                            </div>
                            <div>
                                <label>DNI</label>
                                <input type="text" maxlength="8" class="form-control" id="edni" name="edni">
                            </div>
                            <div class="row mt-3">
                                <div class="d-grid w-50">
                                    <button id="btnactualizar" class="btn btn-success">Guardar</button>
                                </div>
                                <!--
                                <div class="d-grid w-50">
                                    <button id="btneliminar" class="btn btn-danger">Eliminar</button>
                                </div>
                                -->
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="assets/js/administrador/crudEmpleado.js"></script>
</body>

</html>