<?php

//recepcion de datos del formulario
    $nombre = $_REQUEST['aNombre'];
    $email = $_REQUEST['aEmail'];
    $direccion = $_REQUEST['aDireccion'];
    $numero = $_REQUEST['aCelular'];
    $fecha_nacimiento = $_REQUEST['aNacimiento'];
    $user = $_REQUEST['aUser'];
    $password = $_REQUEST['aPass'];
    $cargo = $_REQUEST['aCargo'];

//guardar los datos en un archivo txt
$control = fopen("empleado.txt", "a+");
if ($control == false) {
    die("no se ha podido crear el archivo.");
}

//si no estan los campos llenos no se guarda nada en el archivo de texto
    fputs($control, $nombre . PHP_EOL);
    fputs($control, $email . PHP_EOL);
    fputs($control, $direccion . PHP_EOL);
    fputs($control, $numero . PHP_EOL);
    fputs($control, $fecha_nacimiento . PHP_EOL);
    fputs($control, $user . PHP_EOL);
    fputs($control, $password . PHP_EOL);
    fputs($control, $cargo . PHP_EOL);
    fclose($control);


?>