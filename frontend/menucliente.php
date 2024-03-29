<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="../assets/img/delivery.png" alt="logo">
            </span>

            <div class="text logo-text">
                <span class="name">Boomerang</span>
                <span class="profession"><?php echo $nombreCliente ?></span>
            </div>
        </div>

        <!-- cambia el icono segun el dispositivo -->
        <?php
        $user_agent = $_SERVER["HTTP_USER_AGENT"];
        if (preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $user_agent)) {
            echo "<i class='bx bx-grid-small toggle'></i>";
        } else {
            echo "<i class='bx bx-chevron-right toggle'></i>";
        }
        ?>


    </header>

    <div class="menu-bar">
        <div class="menu">

            <li class="search-box">
                <i class='bx bx-search icon'></i>
                <input type="text" placeholder="Search...">
            </li>

            <ul class="menu-links">
                <li class="nav-link">
                    <a href="platos.php" target="myFrame">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Inicio</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="ofertas.php" target="myFrame">
                        <i class='bx bx-bowl-rice icon'></i>
                        <span class="text nav-text">Ofertas</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="pedidos.php" target="myFrame">
                    <i class='bx bx-cart-download icon'></i>
                        <span class="text nav-text">Pedidos</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="perfil2.php" target="myFrame">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text">Perfil</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="chatbot.php" target="myFrame">
                        <i class='bx bx-support icon'></i>
                        <span class="text nav-text">Soporte</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a href="../backend/controller/cerrarSesionCliente.php">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Salir</span>
                </a>
            </li>

            <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>

        </div>
    </div>

</nav>