<?php
$cabecera="Chat";

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

if ($rolColaborador == "Administrador") {
    header("location: ../administrador");
} elseif ($rolColaborador == "Delivery") {
    header("location: ../delivery");
}elseif(!isset($rolColaborador)){
    header("location: ../");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>|Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../assets/css/cliente/cabecera.css">
    <style>
        body {
            overflow: hidden;
        }

        .altura {
            height: calc(100vh - 63.7px);
            padding-top: 0.6rem;
            padding-bottom: 0.6rem;
        }

        .titulo {
            background: #F97777;
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            line-height: 60px;
            text-align: center;
            border-bottom: 1px solid #fd7d1c;
            border-radius: 5px 5px 0 0;
        }

        .cuerpo {
            width: 100%;
            height: calc(100vh - 210px);
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

        .mensaje {
            display: flex;
            height: 60px;
            width: 100%;
            align-items: center;
            justify-content: space-evenly;
            background: #efefef;
            border-top: 1px solid #d9d9d9;
            border-radius: 0 0 5px 5px;
        }

        .mensaje .datos {
            height: 40px;
            width: 94%;
            position: relative;
        }

        .mensaje .datos input {
            height: 100%;
            width: 100%;
            outline: none;
            border: 1px solid transparent;
            padding: 0 80px 0 15px;
            border-radius: 3px;
            font-size: 15px;
            background: #fff;
            transition: all 0.3s ease;
        }

        .mensaje .datos input:focus {
            border-color: #F97777;
        }

        .datos input::placeholder {
            color: #999999;
            transition: all 0.3s ease;
        }

        .datos input:focus::placeholder {
            color: #bfbfbf;
        }

        .container .mensaje .datos button {
            position: absolute;
            right: 5px;
            top: 50%;
            height: 30px;
            width: 65px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            outline: none;
            opacity: 0;
            pointer-events: none;
            border-radius: 3px;
            background: #F97777;
            border: 1px solid #F97777;
            transform: translateY(-50%);
            transition: all 0.3s ease;
        }

        .container .mensaje .datos input:valid~button {
            opacity: 1;
            pointer-events: auto;
        }

        .mensaje .datos button:hover {
            background: #F97777;
        }

        .bot {
            width: 100%;
            display: flex;
            align-items: baseline;
        }

        .bot .perfil {
            height: 40px;
            width: 40px;
            color: #fff;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            font-size: 18px;
            background: #F97777;
        }

        .bot .sms {
            max-width: 80%;
            margin-left: 10px;
        }

        .bot .sms p {
            color: #fff;
            background: #F97777;
            border-radius: 10px;
            padding: 8px 10px;
            font-size: 14px;
        }

        .usuario {
            width: 100%;
            display: flex;
            align-items: baseline;
            justify-content: flex-end;
        }

        .usuario .perfil {
            height: 40px;
            width: 40px;
            color: #333;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            font-size: 18px;
            background: #efefef;
            margin-right: 10px;
        }

        .usuario .sms {
            max-width: 69%;
            margin-right: 10px;
        }

        .usuario .sms p {
            color: #333;
            background: #efefef;

            border-radius: 10px;
            padding: 8px 10px;
            font-size: 14px;
        }


        @media screen and (max-width: 720px) {
            .texto {
                display: none;
            }

            .cuerpo {
                height: calc(100vh - 260px);
            }
        }
    </style>
</head>

<body>
    <?php
    $user_agent = $_SERVER["HTTP_USER_AGENT"];
    if (preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $user_agent)) {
        require_once "../../frontend/cabeceraColaborador.php";
    }
    ?>

<main>
        <div class="container altura">
            <h3 class="texto mt-3">Chat Corporativo</h3>
            <div class="titulo">
                <label for="">Chat Boomerang</label>
            </div>
            <section class="cuerpo" id="messages">

            </section>

            <div class="mensaje">
                <div class="datos">
                    <input id="msgTxt" type="text" placeholder="Escribe algo aquí.." required>
                    <button  id="msgBtn" onclick="module.sendMsg()">Enviar</button>
                </div>
            </div>
        </div>
    </main>

    <script src="../../assets/js/menu/activarDarkmode.js"></script>
    <script>
        module = {};
    </script>
    <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.23.0/firebase-app.js";
        import { getDatabase, ref, set, remove, onChildAdded, onChildRemoved } from "https://www.gstatic.com/firebasejs/9.23.0/firebase-database.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyDh2tV3yB683KB8AbHZCSK9N-2--A47ztw",
            authDomain: "delivery-9a34c.firebaseapp.com",
            projectId: "delivery-9a34c",
            storageBucket: "delivery-9a34c.appspot.com",
            messagingSenderId: "423986390617",
            appId: "1:423986390617:web:15605a11725acd7e75b348"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const db = getDatabase(app);
        
        //variables
        var msgTxt = document.getElementById("msgTxt");
        var name = "<?php echo $nombreColaborador ?>";
        //enviar mensaje
        module.sendMsg = function sendMsg() {
            var msg = msgTxt.value;
            set(ref(db, 'messages/' + Date.now()), {
                nombre: name,
                msg: msg
            });
        }

        //variables
        var messages = document.getElementById("messages");

        // recibir mensajes
        onChildAdded(ref(db, 'messages'), (data) => {
            if (data.val().nombre == name) {
                messages.innerHTML += "<div class='usuario' id='usuario'><div class='sms'><p class='text-wrap' for=''>Tu : "+data.val().msg+"</p></div><div class='perfil'><i class='bx bxs-user'></i></div></div>";
            }else{
                messages.innerHTML += "<div class='bot' id='bot'><div class='perfil'><i class='bx bxs-bot'></i></div><div class='sms'><p class='text-wrap' for=''>"+data.val().nombre+" : "+data.val().msg+"</p></div></div>";
            }
        });
    </script>
</body>

</html>