<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	<?php
		setcookie("idioma_seleccionado","en",time()-1);
		setcookie("idioma_seleccionado","es",time()-1);
		header("Location:ver_cookie.php");
		?>
</body>
</html>