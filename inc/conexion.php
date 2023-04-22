<?php

    function conectar()
    {
        require_once('config.php');
        $con=mysqli_connect($servidor,$usuario,$pass);
        mysqli_select_db($con,$bbdd);
        //$con = new PDO("sqlsrv:Server=$host;Database=$dbname",$username,$password);
        //"C:\xamp2\apache\bin\curl-ca-bundle.crt"
        return $con;
    }
    ?>

    
