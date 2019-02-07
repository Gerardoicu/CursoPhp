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
include("conexion.php");
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
	header("Location:index.php");
}
	
?>
<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellido</td>
      <td class="primera_fila">Dirección</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr> 
   
	<?php
	  foreach($registros as $persona):?>
		
   	<tr>
      <td> <?php echo $persona->id?></td>
      <td><?php echo $persona->nombre?></td>
      <td><?php echo $persona->apellido?></td>
      <td><?php echo $persona->direccion?></td>
 
      <td class="bot"><a href="borrar.php?id=<?php echo $persona->id?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
      <td class='bot'><a href="editar.php?id=<?php echo $persona->id?> & nombre=<?php echo $persona->nombre?> & apellido=<?php echo $persona->apellido?> & direccion=<?php echo $persona->direccion?> "><input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>       
	<tr>
		<?php endforeach;?>
		
		
		
	<td></td>
      <td><input type='text' name='Nom' size='10' class='centrado'></td>
      <td><input type='text' name='Ape' size='10' class='centrado'></td>
      <td><input type='text' name=' Dir' size='10' class='centrado'></td>
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>    
  </table>
</form>
<p>&nbsp;</p>
</body>	

</body>
</html>