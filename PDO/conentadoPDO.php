<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Documento sin título</title>
</head>

<body>

	<?php
	try {
		$base = new PDO( 'mysql:host=localhost;dbname=pruebas', 'root', '' );
		$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");
		$sql="SELECT NOMBREARTÍCULO,SECCIÓN,PRECIO,PAÍSDEORIGEN,FECHA,IMPORTADO,CÓDIGOARTÍCULO FROM PRODUCTOSNUEVOS WHERE NOMBREARTÍCULO=:n_art";	// esto es un marcador  n_art=>
		$resultado=$base->prepare($sql);
		// esto es un marcador  n_art=>
		$resultado->execute(array(":n_art"=>"serrucho"));
		while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
		{
			echo "Nombre Articulo".$registro["NOMBREARTÍCULO"] ;
				echo "Nombre Articulo".$registro["SECCIÓN"] ;
				echo "Nombre Articulo".$registro["PRECIO"] ;
				echo "Nombre Articulo".$registro["PAÍSDEORIGEN"] ;
				echo "Nombre Articulo".$registro["FECHA"] ;
				echo "Nombre Articulo".$registro["IMPORTADO"] ;
				echo "Nombre Articulo".$registro["CÓDIGOARTÍCULO"] ;
		}
		
	} 
	catch ( exception $e ) {
		die( 'Error: ' . $e->getMessage() );
		echo 'No se ha podido conectar a la base de datos';
	}finally{
		
		$base=null;
	}
	?>
</body>
</html>