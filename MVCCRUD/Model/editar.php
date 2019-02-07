<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>
<?php
require_once("../Db/Conectar.php");
$conexion=Conectar::conexion();
	
if(!isset($_POST["bot_actualizar"])){
	$id=$_GET["id"];
	$nombre=$_GET["nombre"];
	$apellido=$_GET["apellido"];
	$direccion=$_GET["direccion"];
}
else{
	$id=$_POST["id"];
	$nombre=$_POST["nom"];
	$apellido=$_POST["ape"];	
	$direccion=$_POST["dir"];	
	$sql="UPDATE datos_usuarios set nombre=:miNom,apellido=:miApe,direccion=:miDir WHERE id=:miId"	;
	$resultado=$conexion->prepare($sql);
	$resultado->execute(array(":miId"=>$id,":miNom"=>$nombre,":miApe"=>$apellido,":miDir"=>$direccion));
	header("Location:../index.php");
}
	
?>
	<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value='<?php echo $id ?>'></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $nombre ?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $apellido ?>"></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
      <input type="text" name="dir" id="dir" value="<?php echo $direccion ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>