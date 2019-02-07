<?php
try{
	$conexion= new PDO('mysql:host=localhost; dbname=pruebas','root','');
	$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$conexion->exec("SET CHARACTER SET UTF8");
}
catch(Exception $e)
{
	die("Error: ".$e->getMessage());
	echo "linea de el error:  ". $e->getLine();
}










?>