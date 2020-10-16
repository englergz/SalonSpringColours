<?php
    $pass = "1234";
    $usuario = "postgres";
    $nomdb = "inscripciones";
    $rutaServidor = "localhost";
    $puerto = "5432";

    try {
        $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nomdb", $usuario, $pass);
        $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e){
        echo "Ocurrio un error con la base de datos: ".$e->getMessage();
    }
?>