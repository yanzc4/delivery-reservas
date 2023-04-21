<?php

class Controller
{

    public function __construct()
    {
        // this es una referencia a la clase actual
        $this->cargarModel();
        $this->view = new Views();
    }

    public function cargarModel()
    {
        // get_class() devuelve el nombre de la clase
        $model = get_class($this) . 'Model';
        $ruta = 'model/' . $model . '.php';
        if (file_exists($ruta)) {
            require_once $ruta;
            $this->model = new $model();
        }
    }

}
