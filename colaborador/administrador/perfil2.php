<?php
$cabecera = "Perfil";


session_start();
$usuarioColaborador = $_SESSION['usuarioc'];
$passwordColaborador = $_SESSION['passwordc'];
$rolColaborador = $_SESSION['rolc'];
$idColaborador = $_SESSION['idc'];
$nombreColaborador = $_SESSION['nombrec'];
$emailColaborador = $_SESSION['emailc'];
$telefonoColaborador = $_SESSION['telefonoc'];
$f_nacimientoColaborador = $_SESSION['f_nacimientoc'];
$imagenColaborador = $_SESSION['imagenc'];
$direccionColaborador = $_SESSION['direccionc'];
$estadoColaborador = $_SESSION['estadoc'];

if ($rolColaborador == "Delivery") {
  header("location: ../delivery");
} elseif ($rolColaborador == "Monitoreo") {
  header("location: ../monitoreo");
}elseif(!isset($rolColaborador)){
  header("location: ../");
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">

  <meta name="apple-mobile-web-app-title" content="CodePen">
  <title>Perfil USuario</title>
  <link rel="canonical" href="https://codepen.io/TurkAysenur/pen/QWyPMgq" />
  <link rel="stylesheet" href="../../assets/css/perfil2.css">
</head>

<body translate="no">
  <div class="container">

    <!-- Lateral Izquierdo -->
    <div class="user-profile-area">
      <div class="task-manager">Datos Nombre</div>
      <!-- Cuadro Perfil 01 (con Imagen) -->
      <div class="side-wrapper">
        <div class="user-profile">
          <img src="../../<?php echo $imagenColaborador ?>" alt="" class="user-photo">
          <!-- Nombre del Ususario -->
          <div class="user-name"><?php echo $nombreColaborador ?></div>
          <div class="user-mail"><a href="mailto:<?php echo $emailColaborador ?>" class="__cf_email__">[<?php echo $emailColaborador ?>]</a></div>
        </div>
        <!-- Botones Admin-->
        <div class="user-notification">
          <!-- Boton configuracion -->
          <button class="btn notify">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" fill="currentColor">
              <path d="M13.533 5.6h-.961a.894.894 0 01-.834-.57.906.906 0 01.197-.985l.675-.675a.466.466 0 000-.66l-1.32-1.32a.466.466 0 00-.66 0l-.676.677a.9.9 0 01-.994.191.906.906 0 01-.56-.837V.467A.467.467 0 007.933 0H6.067A.467.467 0 005.6.467v.961c0 .35-.199.68-.57.834a.902.902 0 01-.983-.195L3.37 1.39a.466.466 0 00-.66 0L1.39 2.71a.466.466 0 000 .66l.675.675c.25.25.343.63.193.995a.902.902 0 01-.834.56H.467A.467.467 0 000 6.067v1.866c0 .258.21.467.467.467h.961c.35 0 .683.202.834.57a.904.904 0 01-.197.984l-.675.676a.466.466 0 000 .66l1.32 1.32a.466.466 0 00.66 0l.68-.68a.894.894 0 01.994-.187.897.897 0 01.556.829v.961c0 .258.21.467.467.467h1.866c.258 0 .467-.21.467-.467v-.961c0-.35.202-.683.57-.834a.904.904 0 01.984.197l.676.675a.466.466 0 00.66 0l1.32-1.32a.466.466 0 000-.66l-.68-.68a.894.894 0 01-.187-.994.897.897 0 01.829-.556h.961c.258 0 .467-.21.467-.467V6.067a.467.467 0 00-.467-.467zM7 9.333C5.713 9.333 4.667 8.287 4.667 7S5.713 4.667 7 4.667 9.333 5.713 9.333 7 8.287 9.333 7 9.333z" />
            </svg>
          </button>
          <!-- Boton notificaciones -->
          <button class="btn notify alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
              <path d="M467.812 431.851l-36.629-61.056a181.363 181.363 0 01-25.856-93.312V224c0-67.52-45.056-124.629-106.667-143.04V42.667C298.66 19.136 279.524 0 255.993 0s-42.667 19.136-42.667 42.667V80.96C151.716 99.371 106.66 156.48 106.66 224v53.483c0 32.853-8.939 65.109-25.835 93.291L44.196 431.83a10.653 10.653 0 00-.128 10.752c1.899 3.349 5.419 5.419 9.259 5.419H458.66c3.84 0 7.381-2.069 9.28-5.397 1.899-3.329 1.835-7.468-.128-10.753zM188.815 469.333C200.847 494.464 226.319 512 255.993 512s55.147-17.536 67.179-42.667H188.815z" />
            </svg>
          </button>
        </div>
        <!-- Datos generales -->
        <div class="task-status">
          <div class="task-stat">
            <div class="task-number">12</div>
            <div class="task-condition">Completed</div>
            <div class="task-tasks">tasks</div>
          </div>
          <div class="task-stat">
            <div class="task-number">22</div>
            <div class="task-condition">To do</div>
            <div class="task-tasks">tasks</div>
          </div>
          <div class="task-stat">
            <div class="task-number">243</div>
            <div class="task-condition">All</div>
            <div class="task-tasks">completed</div>
          </div>
        </div>
      </div>
      <!-- Cuadro Perfil 02 (con Imagen) -->
      <div class="side-wrapper">
        <div class="project-title">Datos Personales</div>
        <div class="project-name">
          <div class="project-department">Codigo: <?php echo $idColaborador ?></div>
          <div class="project-department">Celular: <a href="tel:<?php echo $telefonoColaborador ?>"><?php echo $telefonoColaborador ?></a></div>
          <div class="project-department">Dirección: <?php echo $direccionColaborador ?></div>
          <div class="project-department">Fecha de Nacimiento: <?php echo $f_nacimientoColaborador ?></div>
          <div class="project-department">Usuario: <?php echo $usuarioColaborador ?></div>
        </div>
      </div>
      <!-- Cuadro Perfil 02 (con Imagen) -->
      <div class="side-wrapper">
        <div class="project-title">Ultimos platos</div>
        <div class="team-member">
          <img src="https://images.unsplash.com/flagged/photo-1574282893982-ff1675ba4900?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1000&q=80" alt="" class="members">
          <img src="https://assets.codepen.io/3364143/Screen+Shot+2020-08-01+at+12.24.16.png" alt="" class="members">
          <img src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60" alt="" class="members">
          <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&auto=format&fit=crop&w=998&q=80" alt="" class="members">
          <img src="https://images.unsplash.com/photo-1541647376583-8934aaf3448a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=934&q=80" alt="" class="members">
        </div>
      </div>

    </div>

    <!-- Lateral Derecho -->
    <div class="main-area">

      <div class="mail-contents">
        <div class="mail-detail-profile">
          <img src="../../<?php echo $imagenColaborador ?>" alt="" class="members inbox-detail" />
          <div class="mail-detail-name"><?php echo $nombreColaborador ?></div>
        </div>


        <div class="mail-detail">
          <label class="user-name">Tu Foto</label>
        </div>
        <div class="grid-65">
          <span class="photo" title="Upload your Avatar!"></span>
          <input type="file" class="btn">
        </div>


        <div class="mail-detail">
          <label class="user-name">Nombres:</label>
        </div>
        <div class="grid">
          <input type="text" id="fname" tabindex="1" />
        </div>


        <div class="mail-detail">
          <label class="user-name" for="lname">Apellidos</label>
        </div>
        <div class="grid-65">
          <input type="text" id="lname" tabindex="2" />
        </div>

        <!-- Country -->

        <div class="mail-detail">
          <label class="user-name" for="country">Direcion</label>
        </div>
        <div class="grid-65">
          <input type="text" id="country" tabindex="5" />
        </div>
        <!-- Location -->

        <div class="mail-detail">
          <label class="user-name" for="location">Ciudad</label>
        </div>
        <div class="grid-65">
          <input type="text" id="location" tabindex="4" />
        </div>
        <!-- Referencias direccion -->

        <div class="mail-detail">
          <label class="user-name" for="description">Referencia</label>
        </div>
        <div class="grid-65">
          <textarea name="" id="" cols="30" rows="auto" tabindex="3"></textarea>
        </div>



        <!-- Email -->

        <div class="mail-detail">
          <label class="user-name" for="email">Correo</label>
        </div>
        <div class="grid-65">
          <input type="email" id="email" tabindex="6" />
        </div>
        <!-- Email -->

        <div class="mail-detail">
          <label class="user-name" for="email">Numero Celular</label>
        </div>
        <div class="grid-65">
          <input type="number" id="email" tabindex="8" />
        </div>

        <!-- Looking for Work -->

        <div class="mail-detail">
          <label class="user-name" for="forHire">Estas trabajando</label>
        </div>
        <div class="grid-65">
          <select name="work" id="forHire" tabindex="7">
            <option value="yes">Si</option>
            <option value="no">No</option>
          </select>
        </div>


        <!--   
          <div class="mail-contents">
            <div class="mail-contents-subject">
              <input type="checkbox" name="msg" id="mail20" class="mail-choice" checked>
              <label for="mail20"></label>
              <div class="mail-contents-title">Write an article about design</div>
            </div>
            <div class="mail">
              <div class="mail-time">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-clock">
                  <circle cx="12" cy="12" r="10" />
                  <path d="M12 6v6l4 2" />
                </svg>
                12 Mar, 2019
              </div>
              <div class="mail-inside">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce accumsan commodo
                lectus gravida dictum. Aliquam a dui eu arcu hendrerit porta sed in velit. Fusce eu semper magna. Aenean
                porta facilisis neque, ac dignissim magna vestibulum eu. Etiam id ligula eget neque placerat ultricies
                in sed neque. Nam vitae rutrum est. Etiam non condimentum ante, eu consequat orci. Aliquam a dui eu arcu
                hendrerit porta sed in velit. Fusce eu semper magna.</div>
              <div class="mail-assign">
                <div class="assignee">
                  <strong>Okla Nowak</strong> assigned to Natalie Smith.
                  <span class="assign-date">25 Nov, 2019</span>
                </div>
                <div class="assignee">
                  <strong>Okla Nowak</strong> added to Marketing.
                  <span class="assign-date">18 Feb, 2019</span>
                </div>
                <div class="assignee">
                  <strong>Okla Nowak </strong> created task.
                  <span class="assign-date">18 Feb, 2019</span>
                </div>
              </div>


            </div>

          </div> -->

      </div>
      <!--   
      <div class="mail-textarea">
        <input type="text" placeholder="Write a comment...">

      </div>-->
    </div>
  </div>
  </div>
  </div>
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script id="rendered-js">
    $('.mail-choice').change(function() {
      if ($(this).is(":checked")) {
        $(this).parent().addClass('selected-bg');
      } else {
        $(this).parent().removeClass('selected-bg');
      }
    });

    const colorInput = document.getElementById("colorpicker");

    colorInput.addEventListener("input", e => {
      document.body.style.setProperty("--button-color", e.target.value);
    });

    $('.inbox-calendar').click(function() {
      $('.calendar-container').toggleClass('calendar-show');
      $('.inbox-container').toggleClass('hide');
      $('.mail-detail').toggleClass('hide');
    });
    //# sourceURL=pen.js
  </script>

<script src="../../assets/js/administrador/activarModoOscuro.js"></script>

</body>

</html>