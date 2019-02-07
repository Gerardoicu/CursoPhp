<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	<?php
	if(isset($_COOKIE["idioma_seleccionado"]))
	{
 if($_COOKIE["idioma_seleccionado"]=="es"){
		header("location:espanol.php");
	}else if($_COOKIE["idioma_seleccionado"]=="en"){
		header("location:english.php");
	}}
	?>
	<h1 align="center"> Elige el idioma</h1>
	<table align="center" width="00" border="0">
  <tbody>
    <tr>
      <td><a href="creaCookie.php?idioma=es"><img src="es.png" width="90" height="80" alt=""/></a></td>
      <td><a href="creaCookie.php?idioma=en"><img src="gb.png" width="90" height="80" alt=""/></a></td>
    </tr>
  </tbody>
</table>

</body>
</html>