<!DOCTYPE html>
<html>
<head>
<title>Practicando php</title>
	<style>
	.resaltar{
	 color:#f00;
	
	 font-weight:bold;
	}
</style>
</head>
<body>
<?php
/* "" las comillas doblen toman el valor de la variable*/
/* '' las comillas simples toman el valor literal*/
$nombre="Juan";
$nombre2="Roberto";
// strcmp compara una cadena de string
//strcasecmp compara una cadena de string con case sensitive
$resultado=strcmp ($nombre,$nombre2);  
if ($resultado)// devuelve un true si no son iguales
{
echo "<p class='resaltar'> no son iguales</p>";
	}
	else{
	echo "<p class='resaltar'>  son iguales</p>";	
	}
  echo "<p class='resaltar'> Hola mundo php ".$nombre. "</p>";
?> 
</body>
</html>
