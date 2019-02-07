<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulario con archivo</title>
	<style>
		table{
			margin:auto;
			width:450px;
			border:2px dotted #FF0000;
		}
		</style>
</head>

<body>
	<form action="datosArchivos.php" method="post" enctype="multipart/form-data">
<table>
		<tr>
			<td><label for="archivo">archivo:</label></td>
			<td><input name="archivo" type="file" size="20"></td>
		</tr>
	<tr>
		<td colspan="2" style="text-align: center"><input  type="submit" value="Enviar archivo"></td>
	</tr>
		</table>
		
	</form>
</body>
</html>