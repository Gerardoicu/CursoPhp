<?php
$resultado=" ";
// else if   > y si esto se cumple hacer lo siguiente
// else > y si no es verdad
if(isset($_POST["ColoresPrimarios1"]) and isset($_POST["ColoresPrimarios2"]))
{

 $primario1 =$_POST['ColoresPrimarios1'];  
$primario2=$_POST['ColoresPrimarios2'];  
	 
echo $primario1;
	echo $primario2;
if($primario1=="Azul" and $primario2=="Azul")
{
	$resultado="Azul";
	
}
   if($primario1=="Rojo" and $primario2=="Rojo" )
{
	$resultado="Rojo";
	
}
  if($primario1=="Amarillo" and $primario2=="Amarillo")
{
	$resultado="Amarillo";
	
}
 if($primario1=="Amarillo" and $primario2=="Azul" or $primario1=="Azul" and $primario2=="Amarillo")
{
	$resultado="Verde";
	
}
	 if($primario1=="Amarillo" and $primario2=="Rojo" or $primario1=="Rojo" and $primario2=="Amarillo")
{
	$resultado="Naranja";
	
}
			 if($primario1=="Azul" and $primario2=="Rojo" or $primario1=="Rojo" and $primario2=="Azul")
{
	$resultado="Morado";
	
}
}		
		

echo "<b>". $resultado ."</b>"	
?>