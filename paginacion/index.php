<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Paginación</title>
</head>

<body>
	<?php 
	try{
	$base= new PDO("mysql:host=localhost; dbname=pruebas","root","");
	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$base->exec("SET CHARACTER SET UTF8");
	$tamanop=3;
		if(isset($_GET["pagina"])){
			if($_GET["pagina"]==1){
			
				header("location:index.php");
			}else{
				$pagina=$_GET["pagina"];
		}
			}
	$pagina=1;
	$empezarDesde=($pagina-1)*$tamanop;
		$sql="SELECT NOMBREARTÍCULO,SECCIÓN,PRECIO,PAÍSDEORIGEN FROM productos WHERE  SECCIÓN='DEPORTES'";
		$resultado=$base->prepare($sql);
		$resultado->execute(array());
		$numfilas= $resultado->rowCount();
		$totlapaginas=ceil($numfilas/$tamanop);
	echo "Numero de registros de la consulta: ".$numfilas. "<br>";
	echo "Mostramos ".$tamanop. " Registros por pagina". "<br>";
	echo "Mostrando la pagina ".$pagina. " de ". $totlapaginas. "<br>";
	$sqlLimite="SELECT NOMBREARTÍCULO,SECCIÓN,PRECIO,PAÍSDEORIGEN FROM productos WHERE  SECCIÓN='DEPORTES' LIMIT $empezarDesde,$tamanop";
		$resultado=$base->prepare($sqlLimite);
		$resultado->execute(array());	
		while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
		{
			echo "NOMBRE ARTÍCULO : ".$registro["NOMBREARTÍCULO"]." SECCIÓN: ".$registro["SECCIÓN"]." PRECIO: ".$registro["PRECIO"]." PAIS DE ORIGEN: ".$registro["PAÍSDEORIGEN"]."<br>";
		}
		$resultado->closeCursor();
	}
	catch(Exception $e){
	die("Error: ".$e->getMessage());
	echo "linea de el error:  ". $e->getLine();
	}
	
	//paginacion
	
	for($i=1;$i<=$totlapaginas;$i++)
	{
		echo "<a href='?pagina=".$i."'>".$i."</a>  ";
	}
	?>
</body>
</html>
