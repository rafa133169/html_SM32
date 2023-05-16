<?php

include_once('conexion.php');
try{
if(isset($_POST['editar'])){
    $elid=$_POST['id'];
    $titulo=$_POST['titulo'];
    $fecha=date('Y-m-d');
    $descripcion=$_POST['descripcion'];
    $sql="update Tarea set titulo=:titulos, descripcion::descripciones where ID=:elid"; 
    $sql = $conexion->prepare("$sql");

    $sql->bindParam(':titulos',$titulo); 
    $sql->bindParam(':descripciones',$descripcion);
    $sql->bindParam(':elid',$elid); 

    $sql->execute();

    echo "el registro fue actualizado correctamente";
}
}catch(Exception $e){
    echo "Hubo un error disculpe";
}
