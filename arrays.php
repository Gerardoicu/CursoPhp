<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Practicas Arrays</title>
</head>
<?php
	$datosIndexados=array("Lunes","Martes","Miercoles","Jueves");
	$datos=array("Nombre"=>"Juan","Apellido"=>"Gomez","EDAD"=>21);
	$datos["Pais"]="Espania";
	$alimentos=array("Fruta"=>array("Tropical"=>"Kiwi",
										 "Citrico"=>"Mandarina",
										 "Otros"=>"Manzana"),
						  "Leche"=>array("Animal"=>"Vaca",
										"Vegetal" =>"Coco"),
						  "Carne"=>array("Vacuno"=>"Lomo",
										"Porcino"=>"Pata"));
	echo $alimentos["Carne"]["Vacuno"] .'</br>';
	if(is_array($datos))
	{
		echo "Es un array";
	}
	else 
	{
		echo "No lo es";
	}
	// aqui recorremos una array no indexado(asociativo )
	foreach($datos as $campos=>$atributos)
	{
		echo $campos ." =  $atributos </br>";
	}
	// ordena el contenido de el arreglo
	sort($datosIndexados);
	$datosIndexados[]="Viernes";
	for($i=0;$i<count($datosIndexados);$i++)
	{
	 echo	$datosIndexados[$i] ."</br>";
	}

	
	?>
<body>
</body>
</html>