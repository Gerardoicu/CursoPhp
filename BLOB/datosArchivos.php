<?php
//recibimos los datos de la archivo
$nombre_archivo=$_FILES['archivo']['name'];
$tipo_archivo=$_FILES['archivo']['type'];
$tamagno_archivo=$_FILES['archivo']['size'];
//echo $_FILES['archivo']['size'];
if($tamagno_archivo<=1000000){

//ruta de la carpera de el servidor
		$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/intranet/uploads/';
// Movemos la archivo de el directorio temporal al directorio escogido
		move_uploaded_file($_FILES['archivo']['tmp_name'],$carpeta_destino.$nombre_archivo);
}
else{
	echo "El tamagno de la archivo es demasiado grande";
}

require("datosConexion.php");
	$conexion=mysqli_connect($db_host,$db_usuario,$db_password,$db_nombre);
	
	if(mysqli_connect_errno())
	{echo "Fallo la conexion a la base de datos";
	 exit();
	}
mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion,"utf8");
$archivo_objetivo=fopen($carpeta_destino.$nombre_archivo,"r");

$contenido=fread($archivo_objetivo,$tamagno_archivo);
$contenido=addslashes($contenido);
fclose($archivo_objetivo);

$query="INSERT INTO archivos(ID,NOMBRE,TIPO,CONTENIDO) VALUES(0,'$nombre_archivo','$tipo_archivo','$contenido')";
$resultados=	mysqli_query($conexion,$query);
if(mysqli_affected_rows($conexion)>0){
echo "Se ha insertado la imagen con exito";
}
else{
	if(strlen($nombre_archivo)>20)
	   { echo "El nombre de la imagen es demasiado grande";}
	echo "No ha habido cambios en la base de datos";
}
?>