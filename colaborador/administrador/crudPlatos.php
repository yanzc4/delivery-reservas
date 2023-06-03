<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../assets/css/ajustes.css"> -->
    <link rel="stylesheet" href="../../assets/css/panel.css">
    <title>Agregar Platos</title>
    <style>
        #modal2 {
            width: 400px;
            height: 400px;
            border: 1px solid black;
            border-radius: 10px;
            /* Aun falta darle el efecto de animacion */
        }

        .caja1 {
            margin-top: 50px;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body class="dark-theme-variables">
    <div class="container caja1">
        <div class="row">
            <h2>Registrar Producto</h2>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-3">

                <form action="">
                    <div class="container w-75">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="txtNombre" id="">
                        <label class="form-label">Precio</label>
                        <input type="number" step="0.1" class="form-control" name="txtPrecio" id="">
                        <label class="form-label">Imagen</label>
                        <input type="file" class="form-control" name="txtImg" id="">
                        <label class="form-label">Categoria</label>
                        <br>

                        <select class="form-select" name="lsCategoria" id="">
                            <option value="">Combo</option>
                            <option value="">Bebida</option>
                            <option value="">Especiales</option>
                            <option value="">Salchipapas</option>
                        </select>

                        <br>
                        <button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#staticBackdrop-a">Crear Categoria</button>
                        <br>
                        <br>
                        <input type="submit" value="Agregar" class="btn btn-outline-primary">
                        <input type="reset" value="Borrar" class="btn btn-outline-danger">
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table  table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Ajustes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td scope="row">R1C1</td>
                                <td>R1C2</td>
                                <td>R1C3</td>
                                <td>R1C4</td>
                                <td>salchiapa.jjjj</td>
                                <td>
                                    
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Editar</button>
        
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                    
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="row">Item</td>
                                <td>Item</td>
                                <td>Item</td>
                                <td>Item</td>
                                <td>salchiapa.jjjj</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Editar</button>
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- MODAL QUE HABRE PARA AGREGAR CATEGORIAS -->
    <div class="modal fade" id="staticBackdrop-a" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel " style="color: black;">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="">
                <h2 style="color:black;">Agregar Categorias</h2>
                <label class="form-label" style="color:black;">Nombre</label>
                <br>
                <input class="form-control" type="text" name="txtNombreCategoria" id="" placeholder="Nombre de la categoria">
                <br>
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th>Ajustes</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td scope="row">R1C1</td>
                                <td>R1C2</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop-c">Editar</button>
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                </td>

                            </tr>
                            <tr class="">
                                <td scope="row">Item</td>
                                <td>Item</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop-c">Editar</button>
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-success" id="btn-agregar-categoria">Agregar</button>
            </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <!-- <button type="button" class="btn btn-primary">Aceptar</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DE EDITAR EL PRODUCTO -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel " style="color: black;">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 style="color: black;">Editar</h2>

                    <form action="">
                        <div class="container w-75">
                            <label class="form-label" style="color: black;">Nombre</label>
                            <input type="text" class="form-control" name="txtNombre" id="">
                            <label class="form-label" style="color: black;">Precio</label>
                            <input type="number" step="0.1" class="form-control" name="txtPrecio" id="">
                            <label class="form-label" style="color: black;">Imagen</label>
                            <input type="file" class="form-control" name="txtImg" id="">
                            <label class="form-label" style="color: black;">Categoria</label>
                            <br>

                            <select class="form-select" name="lsCategoria" id="">
                                <option value="">Combo</option>
                                <option value="">Bebida</option>
                                <option value="">Especiales</option>
                                <option value="">Salchipapas</option>
                            </select>
                            <br>
                            <input type="submit" value="Actualizar" class="btn btn-outline-primary">
                            <input type="reset" value="Borrar" class="btn btn-outline-danger">
                        </div>
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <!-- <button type="button" class="btn btn-primary">Aceptar</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL QUE Habre para editar la categoria -->

    <div class="modal fade" id="staticBackdrop-c" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel " style="color: black;">Editar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 style="color: black;">Editar</h2>

                    <form action="">
                        <label class="form-label" style="color:black;">Nombre</label>
                        <br>
                        <input class="form-control" type="text" name="txtNombreCategoria" id="" placeholder="Nombre de la categoria">
                        <br>
                        
                        <button type="submit" class="btn btn-success" id="btn-agregar-categoria">Actualizar</button>
                        
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <!-- <button type="button" class="btn btn-primary">Aceptar</button> -->
                </div>
            </div>
        </div>
    </div>


    <script src="../assets/js/administrador/modal2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>