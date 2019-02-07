	<?php
// Isset compara si una palabra esta definida
if(isset($_POST["enviando"]))
{

  $numero1=$_POST["numero_1"];
  $numero2=$_POST["numero_2"];
 $resultado=suma($numero1,$numero2);
 echo '<p class=\'validado\'>'.' Suma '.$resultado.'<br/>'.'</p>';
  $resultado=resta($numero1,$numero2);
  echo '<p class=\'validado\'>'.' Resta '.$resultado.'<br/>'.'</p>';
   $resultado=division($numero1,$numero2);
   echo '<p class=\'validado\'>'.' Division '.$resultado.'<br/>'.'</p>';
   $resultado=multiplicacion($numero1,$numero2);
	echo '<p class=\'validado\'>'.' Multiplicacion '.$resultado.'<br/>'.'</p>';
}
function suma($n1,$n2)
{
$resultado= $n1+$n2;
return $resultado;
}
function resta($numero1,$numero2)
{
	$resultado= $numero1-$numero2;
return $resultado;
}

function division($numero1,$numero2)
{
$resultado= $numero1/$numero2;
return $resultado;
}

function multiplicacion($numero1,$numero2)
{
$resultado= $numero1*$numero2;
return $resultado;
}
?>
