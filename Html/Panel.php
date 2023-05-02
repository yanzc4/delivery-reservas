<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./style.css">
    <title>DASHBOARD</title>
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="./images/delivery.png">
                    <h2>TU <span class="danger">DELIVERY</span> </h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-sharp">close</span>
                </div>
            </div>

            <div class="sidebar">
                <a href="#">
                    <span class="material-symbols-sharp">
                        space_dashboard
                    </span>
                    <h3>DASHBOARD</h3>
                </a>
                <a href="#" class="active">
                    <span class="material-symbols-sharp">
                        person_outline
                    </span>
                    <h3>Clientes</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">
                        receipt_long
                    </span>
                    <h3>Pedidos</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">
                        leaderboard
                    </span>
                    <h3>Estadisticas</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">
                        inventory
                    </span>
                    <h3>Productos</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Reportes</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">
                        settings
                    </span>
                    <h3>Ajustes</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">
                        textsms
                    </span>
                    <h3>Mensajes</h3>
                    <span class="message-count">28</span>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">
                        add
                    </span>
                    <h3>Agregar Producto</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">
                        logout
                    </span>
                    <h3>Salir</h3>
                </a>
            </div>
        </aside>

        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-sharp">
                        menu
                    </span>
                </button>
                <div class="theme-toggler">
                    <span class="material-symbols-sharp active">
                        light_mode
                    </span>
                    <span class="material-symbols-sharp">
                        dark_mode
                    </span>
                </div>
                <div class="profile">
                    <div class="info">
                    <p>Hola <b>Admin</b></p>
                    <small class="text-muted">Admin</small>
                    </div>
                </div>
                <div class="profile-photo">
                    <img src="./images/profile-1.jpg" alt="">
                </div>
            </div>
  <!--Termino del top-->          
         </div>
    <script src="./index.js"></script>
</body>

</html>