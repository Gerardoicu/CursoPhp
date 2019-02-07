<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>INSERTANDO CON FORMULARIO</title>
</head>

<body>
		<?php
	$cod=$_GET["c_art"];
	$seccion=$_GET["seccion"];
	$nom=$_GET["n_art"];
	$pre=$_GET["precio"];
	$fec=$_GET["fecha"];
	$imp=$_GET["importado"];
	$por=$_GET["p_orig"];
	//$busqueda=$_GET["buscar"];
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
	$query="INSERT INTO productosnuevos(CÓDIGOARTÍCULO,SECCIÓN,NOMBREARTÍCULO,PRECIO, FECHA,IMPORTADO,PAÍSDEORIGEN) 
	VALUES ('$cod','$seccion','$nom','$pre','$fec','$imp','$por')";
	$resultados=	mysqli_query($conexion,$query);
	// el resulset es una tabla virtual que carga en memoria la conexion y la instruccion SQL 
	//guardado aqui en resultado
	// mysqli_fetch lee linea por linea y guardamos el array en $fila guardandonos el primer registro
	//$fila=mysqli_fetch_row($resultados);
	// esta condicion busca si existe algo en el resultset  si lo encuentra lo muestra

	// mysqli_fetch_row  nos devuelve un arreglo indexado
	//mysqli_fetch_array nos devuelve un arreglo asociativo y una constante
	if($resultados==false){
		echo "Error en la consulta";
	}
	else{
		echo "Insertado con Exito: </br>";
		echo "<table><tr><td>CÓDIGOARTÍCULO</td><td>SECCIÓN</td><td>NOMBREARTÍCULO</td><td>PRECIO</td><td> FECHA</td><td>IMPORTADO</td><td>PAÍSDEORIGEN</td>
		</tr>
		<tr><td>
		$cod</td><td>$seccion</td><td>$nom</td><td>$pre</td><td>$fec</td><td>$imp</td><td>$por</td>
		</tr>
		</table>";
		}
	mysqli_close($conexion);
	?>
</body>
</html>