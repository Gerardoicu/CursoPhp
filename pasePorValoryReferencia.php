<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?php
	$referencia=0;
	// estp Un paso por referencia, un vinculo entre la variable que se envia y a la variable de la funcion
	function incrementa(&$var)
	{
	$var++;
		return $var;
	}function incrementa2($var)
	{
	$var++;
		return $var;
	}
	echo incrementa2($referencia) .'</br>';
	echo $referencia.'</br>';
	echo incrementa($referencia) .'</br>';
	echo $referencia.'</br>';
	echo cambiaMayus("Perrito").'</br>';
function cambiaMayus($palabra)
{
$palabra=	strtolower($palabra);
	return $palabra;
}
	
	
	?>	
	
</body>
</html>