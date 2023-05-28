<?php

//para simular el login con roles por ahora
if ($_POST) {
    $user = $_POST['usuario'];
}

switch ($user) {
    case 'admin':
        header('Location: administrador/');
        break;
    case 'delivery':
        header('Location: delivery/');
        break;
    case 'monitoreo':
        header('Location: monitoreo/');
        break;
}

?>

<!doctype html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="../assets/img/delivery.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Delivery</title>
    <style>
        @font-face {
            font-family: Poppins-Regular;
            src: url('fuentes/poppins/Poppins-Regular.ttf');
        }

        @font-face {
            font-family: Poppins-Medium;
            src: url('fuentes/poppins/Poppins-Medium.ttf');
        }

        @font-face {
            font-family: Poppins-Bold;
            src: url('fuentes/poppins/Poppins-Bold.ttf');
        }

        @font-face {
            font-family: Poppins-SemiBold;
            src: url('fuentes/poppins/Poppins-SemiBold.ttf');
        }


        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
        }

        body,
        html {
            height: 100%;
            font-family: 'Merienda', cursive;
        }


        input {
            outline: none;
            border: none;
        }

        button {
            outline: none !important;
            border: none;
            background: transparent;
        }

        button:hover {
            cursor: pointer;
        }

        /*-- contenedor del Login--*/

        .container-login {
            width: 100%;
            min-height: 100vh;
            display: -webkit-flex;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 15px;
            background: -webkit-linear-gradient(to right, #00dbde, #fc00ff);
            background: linear-gradient(to right, #00dbde, #fc00ff);
        }

        .wrap-login {
            width: 400px;
            background: #eceff1;
            border-radius: 20px;
            overflow: hidden;
            padding: 77px 55px 53px 55px;
            box-shadow: 25px 40px 28px 0px rgba(0, 0, 0, 0.38);
            /* box-shadow: eje-x | eje-y | blur-radius | color */
        }


        /*----Formulario de user y password----*/

        .login-form {
            width: 100%;
        }

        /*estilo del titulo*/

        .login-form-title {
            display: block;
            font-family: 'Merienda', cursive;
            font-size: 40px;
            line-height: 1.5;
            text-align: center;
            animation: text 5s linear infinite;
        }


        .wrap-input100 {
            width: 100%;
            position: relative;
            border-bottom: 2px solid #adadad;
            margin-bottom: 37px;
        }

        .input100 {
            font-family: Poppins-Regular;
            font-size: 15px;
            color: #555555;
            line-height: 1.2;

            display: block;
            width: 100%;
            height: 45px;
            background: transparent;
            padding: 0 5px;
        }

        /*---------------------------------------------*/
        .focus-efecto {
            position: absolute;
            display: block;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }

        .focus-efecto::before {
            content: "";
            display: block;
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 4px;
            /*ancho de la linea que hace el efecto de barra de progeso en el input al hacer foco*/

            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;

            background: #6a7dfe;
            background: -webkit-linear-gradient(left, #21d4fd, #b721ff);
            background: -o-linear-gradient(left, #21d4fd, #b721ff);
            background: -moz-linear-gradient(left, #21d4fd, #b721ff);
            background: linear-gradient(left, #21d4fd, #b721ff);
        }

        .focus-efecto::after {
            font-family: Poppins-Regular;
            font-size: 15px;
            color: #999999;
            line-height: 1.2;

            content: attr(data-placeholder);
            display: block;
            width: 100%;
            position: absolute;
            top: 16px;
            left: 0px;
            padding-left: 5px;

            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
        }

        .input100:focus+.focus-efecto::after {
            top: -15px;
        }

        .input100:focus+.focus-efecto::before {
            width: 100%;
        }

        .has-val.input100+.focus-efecto::after {
            top: -15px;
        }

        .has-val.input100+.focus-efecto::before {
            width: 100%;
        }

        /*---------------------------------------------*/


        .container-login-form-btn {
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding-top: 13px;
        }

        .wrap-login-form-btn {
            width: 100%;
            display: block;
            position: relative;
            z-index: 1;
            border-radius: 40px 5px;
            overflow: hidden;
            margin: 0 auto;
        }

        .login-form-bgbtn {
            position: absolute;
            z-index: -1;
            width: 300%;
            height: 100%;
            background: #a64bf4;
            background: -webkit-linear-gradient(right, #21d4fd, #b721ff, #21d4fd, #b721ff);
            background: -o-linear-gradient(right, #21d4fd, #b721ff, #21d4fd, #b721ff);
            background: -moz-linear-gradient(right, #21d4fd, #b721ff, #21d4fd, #b721ff);
            background: linear-gradient(right, #21d4fd, #b721ff, #21d4fd, #b721ff);
            top: 0;
            left: -100%;

            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
        }

        .login-form-btn {
            font-family: Poppins-Medium;
            font-size: 20px;
            color: #fff;
            line-height: 1.2;
            text-transform: uppercase;

            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 20px;
            width: 100%;
            height: 50px;
        }

        .wrap-login-form-btn:hover .login-form-bgbtn {
            left: 0;
        }


        /*--- Para dispositivos small responsive ---*/

        @media (max-width: 576px) {
            .wrap-login {
                padding: 77px 15px 33px 15px;
            }
        }
    </style>
</head>

<body>

    <div class="container-login">
        <div class="wrap-login">
            <form class="login-form validate-form" id="formLogin" method="post">
                <span class="login-form-title">LOGIN</span>

                <div class="wrap-input100" data-validate="Usuario incorrecto">
                    <input class="input100" type="text" id="usuario" name="usuario" placeholder="Usuario">
                    <span class="focus-efecto"></span>
                </div>

                <div class="wrap-input100" data-validate="Password incorrecto">
                    <input class="input100" type="password" id="password" name="password" placeholder="Password">
                    <span class="focus-efecto"></span>
                </div>

                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <button type="submit" name="submit" class="login-form-btn">CONECTAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>