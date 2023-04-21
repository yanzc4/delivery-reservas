<?php

class Home extends Controller{

    public function __construct(){
        parent::__construct(); // Llama al constructor de la clase padre
    }

    public function index($parametro){
        echo $this->model->prueba($parametro);
    }

}

?>