<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulario con imagenes</title>
	<style>
		table{
			margin:auto;
			width:450px;
			border:2px dotted #FF0000;
		}
		</style>
</head>

<body>
	<form action="datosImagenes.php" method="post" enctype="multipart/form-data">
<table>
		<tr>
			<td><label for="imagen">Imagen:</label></td>
			<td><input name="imagen" type="file" size="20"></td>
		</tr>
	<tr>
		<td colspan="2" style="text-align: center"><input  type="submit" value="Enviar imagen"></td>
	</tr>
		</table>
		
	</form>
</body>
</html>