<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<title>Buscador</title>
	<?php
	function buscando($parametro)
	{
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
	$query="select * from productosnuevos where nombreartículo like '%$parametro%'";
	$resultados=	mysqli_query($conexion,$query);
	// el resulset es una tabla virtual que carga en memoria la conexion y la instruccion SQL 
	//guardado aqui en resultado
	// mysqli_fetch lee linea por linea y guardamos el array en $fila guardandonos el primer registro
	//$fila=mysqli_fetch_row($resultados);
	// esta condicion busca si existe algo en el resultset  si lo encuentra lo muestra
 echo "<div class='limiter'>
		<div class='container-table100'>
			<div class='wrap-table100'>
				<div class='table100 ver1 m-b-110'>
					<table data-vertable='ver1'>
						<thead>
				<tr class='row100 head'>
						
								<th class='column100 column1' data-column='column1'>CODIGO ARTICULO</th>
								<th class='column100 column2' data-column='column2'>SECCION</th>
								<th class='column100 column3' data-column='column3'>NOMBRE ARTICULO</th>
								<th class='column100 column4' data-column='column4'>PRECIO</th>
								<th class='column100 column5' data-column='column5'>FECHA</th>
								<th class='column100 column6' data-column='column6'>IMPORTADO</th>
								<th class='column100 column7' data-column='column7'>PAIS DE ORIGEN</th>
							</tr>
						</thead>		
						";
	// mysqli_fetch_row  nos devuelve un arreglo indexado
	//mysqli_fetch_array nos devuelve un arreglo asociativo y una constante
	while($fila=mysqli_fetch_array($resultados,MYSQLI_ASSOC))
	{	echo "<tbody>
							<tr class='row100'>";
		echo "<td class='column100 column1' data-column='column1'>".$fila['CÓDIGOARTÍCULO']."</td>";
		echo "<td class='column100 column2' data-column='column2'>".$fila['SECCIÓN']."</td>";
		echo "<td class='column100 column3' data-column='column3'>".$fila['NOMBREARTÍCULO']."</td>";
	 	echo "<td class='column100 column4' data-column='column4'>".$fila['PRECIO']."</td>";
	 	echo "<td class='column100 column5' data-column='column5'>".$fila['FECHA']."</td>";
	 	echo "<td class='column100 column6' data-column='column6'>".$fila['IMPORTADO']."</td>";
	 	echo "<td class='column100 column7' data-column='column7'>".$fila['PAÍSDEORIGEN']."</td></tr> ";
		
	}
	echo "</table>";
	mysqli_close($conexion);
	}
	?>
</head>

<body>
	<?php
	$busqueda=$_GET["buscar"];
	$miPag=$_SERVER["PHP_SELF"];
	if($busqueda!=NULL)
	{
		buscando($busqueda);
	}
	else {
	echo "<form action='".$miPag."' method='get'>
	
   <legend>Formulario de Busqueda</legend>
   <table><tr><td>
	<label>Buscar: 
		   </label></td>
	 <td><input type='search' name='buscar' style='width: 66%'  placeholder='Buscar'>
	 <input type='submit' name='enviando' value='Dale'></td></tr>
	</table>
			</form>";
	}
	?>
	<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>