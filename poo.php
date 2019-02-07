<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Clases</title>
</head>
<?php
	class Coche{
		var $ruedas=0;
		var $color;
		var $motor=4;
		function  __construct(){
		
			$this->ruedas=4;
			$this->color=" ";
			$this->motor=1600;
			
			echo $this->motor;
			
		}
		
		function arrancar(){
		echo "Estoy arrancando";
		}
		function girar(){
		echo "Estoy girando";
		}
		function frenar(){
			echo "Estoy frenando";
		}
	}
	
	$renault=new Coche();
	$mazda=new Coche();
	$sead=new Coche();
	$mazda->girar();
	$a='myVar';
	// myVar se convierte es una variable que contine Hola, esto es una VARIABLE VARIABLE
	$$a='Hola';
	echo $a;
	echo "$a $myVar";
	?>
	

<body>
</body>
</html>