<?php
require_once('conexion.php');
if (isset($_GET['id'])){
    $elID=$_GET['id'];
    $consulta="update tarea set Estatus=0 where ID=:elid"; 
    $sql = $conexion->prepare($consulta); 
    $sql->bindParam(':elid',$elID);
    $sql->execute();         
    header('location:dashboard.php');
}
    
?>