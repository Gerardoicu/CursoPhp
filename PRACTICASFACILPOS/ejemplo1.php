
<?php

echo "<h1> APP DATOS PERSONALES MR </h1>";
echo "<hr>";


$persona= array(
      array('manuel', 'romero' ,2),
       array('maria', 'cure' ,5 ),
        array('sofia', 'peralta' ,9 )

	 );
echo "  ".$persona[0][0]."  ".$persona[0][1]."  ".$persona[0][2]."<br>";
echo "  ".$persona[1][0]."  ".$persona[1][1]."  ".$persona[1][2]."<br>";
echo "  ".$persona[2][0]."  ".$persona[2][1]."  ".$persona[2][2]."<br>";

 
$promedio=($persona[0][2] + $persona[1][2]+ $persona[2][2])/3;
echo "El promedio de edad es ".$promedio."<br>";

if($persona[0][2]>$persona[1][2] and$persona[0][2]>$persona[2][2] ){

	echo "manuel es mayor con una edad de ".$persona[0][2];

}else if ($persona[1][2]>$persona[0][2] and$persona[1][2]>$persona[2][2]) {
	echo "maria es mayor con una edad de ".$persona[1][2];
}else{
	echo "sofia es mayor con una edad de ".$persona[2][2];
}


?>