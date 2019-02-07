<?php
//recibimos los datos de la imagen
$nombre_imagen=$_FILES['imagen']['name'];
$tipo_imagen=$_FILES['imagen']['type'];
$tamagno_imagen=$_FILES['imagen']['size'];
//echo $_FILES['imagen']['size'];
if($tamagno_imagen<=1000000){
	echo $tipo_imagen;
	if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/gif" ){
//ruta de la carpera de el servidor
		$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/intranet/uploads/';
// Movemos la imagen de el directorio temporal al directorio escogido
		move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombre_imagen);
	}	
	else{
		echo "Solo se pueden subir imagens Jpeg,jpg y gif";
	}
}
else{
	echo "El tamagno de la imagen es demasiado grande";
}
require("datosConexion.php");
	$conexion=mysqli_connect($db_host,$db_usuario,$db_password,$db_nombre);
	
	if(mysqli_connect_errno())
	{echo "Fallo la conexion a la base de datos";
	 exit();
	}
	 mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la base de datos");
	 mysqli_set_charset($conexion,"utf8");
	$query="UPDATE PRODUCTOSNUEVOS SET FOTO='$nombre_imagen' WHERE CÓDIGOARTÍCULO='AR50'";
	$resultados=	mysqli_query($conexion,$query);
		
?>