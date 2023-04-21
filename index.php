<?php

//!empty para que no se ejecute si no hay nada en la url
$ruta = !empty($_GET['url']) ? $_GET['url'] : 'home/index';
$array = explode('/', $ruta);
$controller = $array[0];
$metodo = 'index';
$parametro = '';

if (!empty($array[1])) {
    if (!empty($array[1] != '')) {
        $metodo = $array[1];
    }
}

if (!empty($array[2])) {
    if (!empty($array[2] != '')) {
        for ($i = 2; $i < count($array); $i++) {
            $parametro .= $array[$i] . ',';
        }
        //trim pa eliminar la ultima coma
        $parametro = trim($parametro, ',');
    }
}

require_once 'config/app/autoload.php';
//ruta del controlador
$directorio = 'controller/' . $controller . '.php';

//para verificar si existe el directorio
if (file_exists($directorio)) {
    require_once $directorio;
    $controller = new $controller();
    if (method_exists($controller, $metodo)) {
        $controller->$metodo($parametro);
    } else {
        echo 'El metodo no existe';
    }
} else {
    echo 'El controlador no existe';
}

?>