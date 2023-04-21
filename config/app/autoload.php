<?php

// -spl_autoload_register- para registrar una o varias funciones de carga automática de clases
spl_autoload_register(function ($class) {
    if (file_exists('config/app/' . $class . '.php')) {
        require_once 'config/app/' . $class . '.php';
    }
});

?>