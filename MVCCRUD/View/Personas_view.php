<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Productos</title>

</head>

<body>
	
	<?php 
	require("Model/borrar.php");
	require("Model/paginacion.php");
	?>
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
	  foreach($matrizPersonas as $persona):?>
		
   	<tr>
      <td> <?php echo $persona["ID"]?></td>
      <td><?php echo $persona["NOMBRE"]?></td>
      <td><?php echo $persona["APELLIDO"]?></td>
      <td><?php echo $persona["DIRECCION"]?></td>
 
      <td class="bot"><a href="Model/borrar.php?id=<?php echo $persona["ID"]?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
      <td class='bot'><a href="Model/editar.php?id=<?php echo $persona["ID"]?> & nombre=<?php echo $persona["NOMBRE"]?> & apellido=<?php echo $persona["APELLIDO"]?> & direccion=<?php echo $persona["DIRECCION"]?> "><input type='button' name='up' id='up' value='Actualizar'></a></td>
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
	
</body>
</html>
