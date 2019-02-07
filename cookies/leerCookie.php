<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	<?php
	if(isset($_COOKIE["prueba"]))
	{
		echo $_COOKIE["prueba"];
		
	}
	else{
		
		echo "la cookie no se ha creado";
	}
	?>
</body>
</html>