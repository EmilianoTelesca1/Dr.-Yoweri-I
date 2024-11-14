<?php

//funcion que permite enlazar la base de datos con los distintos archivos
//conexion a la base de datos mediante mysqli_connect
    function con(){
    $hostname = "localhost";
    $usuariodb = "root";
    $passworddb = "";
    $dbname = "registro";
    $conectar = mysqli_connect($hostname, $usuariodb, $passworddb, $dbname);
    return $conectar;
}

?>