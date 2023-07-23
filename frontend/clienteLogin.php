<!-- Para Login -->

<div class="modal fade" id="frmLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-secundario">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Login</h5>
        <button type="button" class="text-rosa btn-transparente" data-bs-dismiss="modal" aria-label="Close"><i class='bx bx-x fs-2'></i></button>
      </div>
      <div class="modal-body">

        <!--Aqui va el formulario de login-->
        <form method="post">
          <div class="mb-3">
            <label for="loginUser" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="loginUser" name="loginUser" placeholder="Usuario">
          </div>
          <div class="mb-3">
            <label for="loginPassword" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="loginPassword" name="loginPassword" placeholder="Contraseña">
          </div>
          <a href="cliente/" type="submit" class="btn btn-login">Iniciar sesión</a>
        </form>

      </div>
      <div class="modal-footer">
        <label for="" class="">Click aqui si eres <a href="colaborador/" class="text-success">colaborador</a></label>
      </div>
    </div>
  </div>
</div>

<!-- Para Registro -->
<div class="modal fade" id="frmRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-secundario">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Registrarte</h5>
        <button type="button" class="text-rosa btn-transparente" data-bs-dismiss="modal" aria-label="Close"><i class='bx bx-x fs-2'></i></button>
      </div>
      <div class="modal-body">

        <!--Aqui va el formulario de registro-->
        <form method="post">
          <div class="row mb-2">
            <div class="col-6">
              <label for="user" class="form-label">Usuario</label>
              <input type="text" class="form-control" id="user" name="user" placeholder="Usuario">
            </div>
            <div class="col-6">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
            </div>
          </div>

          <div class="mb-2">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre">
          </div>
          <div class="mb-2">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" placeholder="Apellido">
          </div>

          <div class="row mb-2">
            <div class="col-6">
              <label for="fechaNacimiento" class="form-label mb-0 w-100 text-truncate">Fecha de Naacimiento</label>
              <input type="date" class="form-control" name="fechaNacimiento">
            </div>
            <div class="col-6">
              <label for="celular" class="form-label w-100 mb-0 text-truncate">Celular</label>
              <input type="number" id="celular" class="form-control" name="celular" placeholder="Celular">
            </div>
          </div>
          <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
          </div>
          <button type="submit" class="btn btn-login">Registrarse</button>
        </form>

      </div>
      <div class="modal-footer">
        <label for="" class="">Click aqui si eres <a href="colaborador/" class="text-success">colaborador</a></label>
      </div>
    </div>
  </div>
</div>