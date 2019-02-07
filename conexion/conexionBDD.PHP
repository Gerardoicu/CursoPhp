<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Conexion</title>
</head>

<body>
	<?php
	require("datosConexion.php");

		// conexion por procedimiento por medio de la funcion MYSQLI_CONNECT
	//El ultimo argumento de mysqli_connect que es el nombre de la base de datos es opcional
	//podemos llamar posteriormente a mysqli_select_db y llamar la $conexion y el nombre de la base datos
	$conexion=mysqli_connect($db_host,$db_usuario,$db_password,$db_nombre);
	// mysqli_connect_errno .esta funcion se ejecuta siempre  y cuando no se tenga exito en la conexion con //la base de datos
	if(mysqli_connect_errno())
	{echo "Fallo la conexion a la base de datos";
	 exit();
	}
	//el mensaje no lo llegamos a ver debido a que ya validamos la base da datos
	// habria que quitar el argumento con el nombre de la bd
	//mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la base de datos");
	 mysqli_set_charset($conexion,"utf8");
	$query="select * from productosnuevos";
	$resultados=	mysqli_query($conexion,$query);
	// el resulset es una tabla virtual que carga en memoria la conexion y la instruccion SQL 
	//guardado aqui en resultado
	// mysqli_fetch lee linea por linea y guardamos el array en $fila guardandonos el primer registro
	//$fila=mysqli_fetch_row($resultados);
	// esta condicion busca si existe algo en el resultset  si lo encuentra lo muestra
	if($fila=mysqli_fetch_row($resultados))
	{	echo "CODIGO ARTICULO:".$fila[0]." ";
		echo "SECCION:".$fila[1]." ";
		echo "NOMBRE ARTICULO:".$fila[2]." ";
	 	echo "PRECIO:".$fila[3]." ";
	 	echo "FECHA:".$fila[4]." ";
	 echo "IMPORTADO:".$fila[5]." ";
	 echo "PAIS DE ORIGEN:".$fila[6]." ";
		echo "</br>";
	}
	mysqli_close($conexion);
	?>
</body>
</html>