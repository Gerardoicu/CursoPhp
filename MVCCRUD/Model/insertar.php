
<?php

require_once("Conectar.php");
$conexion=Conectar::conexion();
if(isset($_POST["cr"]))
{


	$nombre=$_POST["Nom"];
	$apellido=$_POST["Ape"];
	$direccion=$_POST["Dir"];
	$sql="INSERT INTO DATOS_USUARIOS (nombre,apellido,direccion,password) VALUES(:nom,:ape,:dir,'')";
	$resultado=$conexion->prepare($sql);
	$resultado->execute(array(":nom"=>$nombre,":ape"=>$apellido,":dir"=>$direccion));	
	header("Location:index.php");
}
?>