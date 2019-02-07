<!doctype html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	</head>
<body>
	<?php
	
	$autenticado=false;
			

	if(isset($_POST["enviar"]))
	{
	try{
		
	$base=new PDO("mysql:host=localhost; dbname=pruebas","root","")	;
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="SELECT * FROM USUARIOS_PASS WHERE USUARIOS=:login AND PASSWORD=:password";	
	$resultado=$base->prepare($sql);	
	$login=htmlentities(addslashes($_POST["nombre"]))	;
		$password=htmlentities(addslashes($_POST["password"]))	;
		
		$resultado->bindValue(":login",$login);
		$resultado->bindValue(":password",$password);
		$resultado->execute();
		$numero_registro=$resultado->rowCount();
		if($numero_registro!=0){
			$autenticado=true;
			if(isset($_POST["recordar"])){
					
				setcookie("nombre_usuario",$_POST["nombre"],time()+86400);
			
				
			}
		}
		else{
			
			echo "usuario incorrecto";
		}
	}
	
	
	catch(Exception $e){
		die("Error".$e->getMessage());
	}
		}
	?>
	<?php 

	if($autenticado==false)
	{
	
		if(!isset($_COOKIE["nombre_usuario"]))
		{
		include("formulario.html");
		
		}
	}
			
		
	
	
	?>


<?php
	
	if($autenticado==true ||isset($_COOKIE["nombre_usuario"])){
		echo '<h2>CONTENIDO</h2>
	<table width="800" border="0">
  <tbody>
    <tr>
      <td><img src="imagen/1.jpg" width="300" height="166"></td>
      <td><img src="imagen/2.png" width="300" height="166"></td>
    </tr>
    <tr>
      <td><img src="imagen/3.jpg" width="300" height="166"></td>
      <td><img src="imagen/4.jpg" width="300" height="166"></td>
    </tr>
  </tbody>
</table>';
		
	}
	?>
</body></html>