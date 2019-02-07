<?php
require("datosConexion.php");

$conexion=mysqli_connect($db_host,$db_usuario,$db_password,$db_nombre);
	
	if(mysqli_connect_errno())
	{echo "Fallo la conexion a la base de datos";
	 exit();
	}
	 mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la base de datos");
	 mysqli_set_charset($conexion,"utf8");
	$query="SELECT FOTO FROM PRODUCTOSNUEVOS WHERE CÓDIGOARTÍCULO='AR50'";
	$resultados=	mysqli_query($conexion,$query);
	while($fila=mysqli_fetch_array($resultados))
	{	$ruta_img=$fila['FOTO'];
	 }
?>
<div>
<img src="/intranet/uploads/<?php echo $ruta_img; ?>"alt="imagen de el primer articulo" width="25%">
</div>