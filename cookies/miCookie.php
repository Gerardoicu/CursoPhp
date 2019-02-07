<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	<?php
	// podemos especificar en donde queremos que actue la galleta
	setcookie("prueba","Esto es una galletita de prueba",time()+300,"http://127.0.0.1/CursoPhp/cookies");
	?>
</body>
</html>