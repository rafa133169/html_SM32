<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "tienda";
    $conn = new mysqli($hostname,$username,$password,$database);
    if($conn -> connect_error ){
        die ("Error en la base de datos".$conn->connect_error);
        
    }
    // echo "conexion exitosa";
    // $conn -> close();
?> 