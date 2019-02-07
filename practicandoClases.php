<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	<?php
	
	class Vehiculo
	{
		function __construct($llantas,$velocidad,$color,$modelo,$año,$precio,$descuento){
			$this->llantas="4";
			$this->velocidad=0;
			$this->color="";
			$this->modelo="";
			$this->año="";
			$this->precio="";
			$this->descuento="";
		}
		function getDatos()
		{
		echo "Llantas: ".$this->llantas."</br>";
		echo "Velocidad: ".$this->velocidad."</br>";
		echo "Color: ".$this->color."</br>";
		echo "Modelo: ".$this->modelo."</br>";
		echo "Año: ".$this->año."</br>";
		echo "Precio: ".$this->precio."</br>";
		echo "Descuento: ".$this->descuento."</br>";
		}
		function aumentarVelocidad($velocidad)
		{while(true)
			{
				if(velocidad>0)
				{
				$this->velocidad=$velocidad;
				echo "Velocidad: ".velocidad."</br>";
				break;
				}
				else{
				$this->velocidad=0;
				}
			 }
	}
	}
	$bocho=new Vehiculo("1","2","3","4","5","6","7");
	$bocho->getDatos();
	$bocho->aumentarVelocidad(100);
	$bocho->getDatos();
	?>
</body>
</html>