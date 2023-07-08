<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//ruta de la carpeta de la libreria de phpmailer
require '../../assets/libs/PHPMailer/Exception.php';
require '../../assets/libs/PHPMailer/PHPMailer.php';
require '../../assets/libs/PHPMailer/SMTP.php';
include_once "../../inc/conexion.php";

$correo = $_POST['correo'];
$conn = conectar();

$sql = "SELECT * FROM clientes WHERE correo = '$correo'";
$resultado = $conn->query($sql);
$array = $resultado->fetch_assoc();

if ($array > 0) {

    $id = $array["id"];
    $usuario = $array["user"];
    $pass = $array["pass"];
    $cliente = $array["nombre"] . " " . $array["apellido"];


    //==================================================================================================
    //Enviar correo
    //Crear una instancia de phpmailer y pasarle true para habilitar excepciones
    $mail = new PHPMailer(true);

    try {
        //configuracion del servidor de smtp
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.zoho.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'soporteboofast@zohomail.com';                     //SMTP username
        $mail->Password   = 'Mireyra135#';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //correo del remitente y el nombre
        $mail->setFrom('soporteboofast@zohomail.com', 'BooFast');
        //correo del destinatario y el nombre
        $mail->addAddress($correo, $cliente);

        //Contenido del correo
        $mail->isHTML(true);                                  //enviar el correo como html
        $mail->Subject = 'Recuperar password'; //asunto del correo
        $mail->Body    = 'Hola ' . $cliente . '<br>Recibimos una solicitud para la obtencion de tus credenciales:
    <p>Usuario: ' . $usuario . '</P> <p>Password: ' . $pass . '</p><br><p>Si no solicitaste tus credenciales puedes ignorar este correo</p><br>
    <p>Gracias,</p><br><p>Equipo de Soporte Booofast</p>';  //cuerpo del correo

        $mail->send(); //enviar el correo
        echo 1;
    } catch (Exception $e) {
        echo 0;
    }
}
