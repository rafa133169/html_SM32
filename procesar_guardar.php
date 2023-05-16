<?php

include_once('conexion.php');
try{
if(isset($_POST['guardar'])){
    $titulo=$_POST['titulo'];
    $fecha=date('Y-m-d');
    $descripcion=$_POST['descripcion'];
    $sql="insert into Tarea(titulo,descripcion) values(:titulos,:descripciones)";
    echo "insert into Tarea(titulo,descripcion) values($titulo,$descripcion)";
    $sql = $conexion->prepare("$sql");

    $sql->bindParam(':titulos',$titulo); 
    $sql->bindParam(':descripciones',$descripcion); 

    //$sql->execute();

    $ultimoID = $conexion->lastInsertId();
    if($ultimoID>0){
        echo "Se ingresó correctamente";
    }else{
        echo "No se ingresó los datos";
    }
}
}catch(Exception $e){
    echo "Hubo un error disculpe";
}
?>