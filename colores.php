<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Colores primarios</title>
</head>

<body>
	<form method="post" name="formulariocolores" id="misColores" action="">
		<table width="15%" align="left">
<tr>
	<td><select id="campo1" name="ColoresPrimarios1">
  		<option value="Rojo">Rojo</option>
 		<option value="Azul">Azul</option>
  		<option value="Amarillo">Amarillo</option>
   		</select>
	</td>
	<td><select id="campo2" name="ColoresPrimarios2">
		<option value="Rojo">Rojo</option>
		<option value="Azul">Azul</option>
		<option value="Amarillo">Amarillo</option>
		</select>
	</td>
	<td><input type="submit" id="combinaciones" name="formulario" value="combinar">
	</td>
</tr>	 
			 
		</table>
<?php
include("combinacion.php");

?>
</body>
	
	</form>
</html>
