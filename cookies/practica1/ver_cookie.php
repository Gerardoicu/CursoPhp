<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	<?php
	if(!$_COOKIE["idioma_seleccionado"])
	{	
		header("location:idioma.php");
	}	
	else if($_COOKIE["idioma_seleccionado"]=="es"){
		header("location:espanol.php");
	}else if($_COOKIE["idioma_seleccionado"]=="en"){
		header("location:english.php");
	}
		
		
	
	?>
</body>
</html>