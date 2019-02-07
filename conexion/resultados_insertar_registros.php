<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BUSQUEDA PREPARADA</title>
</head>

<body>
<?php
	
	$c_art=$_GET["c_art"];
	$secc=$_GET["secc"];
	$n_art=$_GET["n_art"];
	$pre=$_GET["pre"];
	$fec=$_GET["fec"];
	$imp=$_GET["imp"];
	$p_ori=$_GET["p_ori"];
	if ($c_art==null or empty(trim($c_art)))
	{
		echo "El campo c_art debe ser llenado";
		
		
	}else{
	require("datosConexion.php");

$conexion = new mysqli($db_host,$db_usuario,$db_password,$db_nombre);
	if($conexion->connect_error) {
  	exit('Error connecting to database'); //Should be a message a typical user could understand in production
	}

$conexion->set_charset("utf8");
	// mysqli_connect_errno .esta funcion se ejecuta siempre  y cuando no se tenga exito en la conexion con //la base de datos


	$sql=$conexion->prepare("INSERT INTO PRODUCTOSNUEVOS (CÓDIGOARTÍCULO,SECCIÓN,NOMBREARTÍCULO,PRECIO,FECHA,IMPORTADO,PAÍSDEORIGEN)VALUES(?,?,?,?,?,?,?)");
	$sql->bind_param('sssssss',$c_art,$secc,$n_art,$pre,$fec,$imp,$p_ori);
$ok=	$sql->execute();
if($conexion->errno){
	die($conexion->error);
}
if($ok==false){
	
	
	echo "Error en la consulta";
}else{
	
	echo "Se ha agregado un nuevo registro";
}
$conexion->close();
	}
	?>
	
</body>
</html>