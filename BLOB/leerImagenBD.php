<?php
require("datosConexion.php");
$id="";
$contenido="";
$tipo="";
$nombre="";
$conexion=mysqli_connect($db_host,$db_usuario,$db_password,$db_nombre);
	
	if(mysqli_connect_errno())
	{echo "Fallo la conexion a la base de datos";
	 exit();
	}
	 mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la base de datos");
	 mysqli_set_charset($conexion,"utf8");
	$query="SELECT * FROM archivos where ID=5";
	$resultados=	mysqli_query($conexion,$query);
	while($fila=mysqli_fetch_array($resultados))
	{	
		$id=$fila['id'];
		$contenido=$fila['contenido'];
		$tipo=$fila['tipo'];
		$nombre=$fila['nombre'];
	 }
echo "id ".$id." <br>";
echo "tipo ".$tipo." <br>";
echo  "<img src='data:image/jpeg;base64,".base64_encode($contenido)."' alt='$nombre'>";
?>

