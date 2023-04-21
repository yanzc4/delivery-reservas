<?php

class Views
{

    public function getView($directorio, $vista)
    {
        if ($directorio == 'home') { // Si el directorio es home, no se agrega el nombre del directorio a la ruta
            $vista = 'views/' . $vista . '.php';
        }else{
            $vista = 'views/' . $directorio . '/' . $vista . '.php';
        }
        return $vista;
    }
}
