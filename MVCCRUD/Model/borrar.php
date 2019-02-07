<?php 
require_once("Conectar.php");
$conexion=Conectar::conexion();

$id=$_GET["ID"];
$conexion->query("DELETE FROM datos_usuarios WHERE ID='$id'");
//header("location:../Index.php")
?>

