<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>
<?php
	include("conexion.php");
	/*$sql=$conexion->query("SELECT * FROM DATOS_USUARIOS");
	$registros=$sql->fetchAll(PDO::FETCH_OBJ);*/
	/// paginacion
	$tamanop=3;
	if(isset($_GET["pagina"])){
		if($_GET["pagina"]==1){
			
			header("location:index.php");
		}else{
			$pagina=$_GET["pagina"];
		}
	}else{
	$pagina=1;
		}
	$empezarDesde=($pagina-1)*$tamanop;
		$sql="SELECT * FROM DATOS_USUARIOS";
		$resultado=$conexion->prepare($sql);
		$resultado->execute(array());
		$numfilas= $resultado->rowCount();
		$totlapaginas=ceil($numfilas/$tamanop);
	
	//terminapaginacion
	$registros=$conexion->query("SELECT * FROM DATOS_USUARIOS ORDER BY ID DESC LIMIT $empezarDesde,$tamanop ")->fetchAll(PDO::FETCH_OBJ);
if(isset($_POST["cr"]))
{

	include("conexion.php");

	$nombre=$_POST["Nom"];
	$apellido=$_POST["Ape"];
	$direccion=$_POST["Dir"];
	$sql="INSERT INTO DATOS_USUARIOS (nombre,apellido,direccion,password) VALUES(:nom,:ape,:dir,'')";
	$resultado=$conexion->prepare($sql);
	$resultado->execute(array(":nom"=>$nombre,":ape"=>$apellido,":dir"=>$direccion));	
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
	  <?php endforeach;?> 
	  
	
	 <tr>
	
	<td></td>
      <td><input type='text' name='Nom' size='10' class='centrado'></td>
      <td><input type='text' name='Ape' size='10' class='centrado'></td>
      <td><input type='text' name=' Dir' size='10' class='centrado'></td>
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>
	  <tr><td> </td><td> </td><td>
		 <?php 
		  //paginacion
	for($i=1;$i<=$totlapaginas;$i++)
	{
		echo "<a href='?pagina=".$i."'>".$i."</a>  ";
	}
	 //paginacion
	?> 
		  
		  </td><td> </td></tr>
  </table>
</form>
	
<p>&nbsp;</p>
</body>
</html>