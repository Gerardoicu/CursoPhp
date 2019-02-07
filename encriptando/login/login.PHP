<!doctype html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	</head>
<body>
	<?php
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
			session_start();
			$_SESSION["usuario"]=$_POST["nombre"];
			
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
	
	
	if(!isset($_SESSION["usuario"]))
	{
		echo "<div class='container'>
	<section id='content'>
		<form action='".$_SERVER['PHP_SELF']."' method='post'>
			<h1>Login </h1>
			<div>
				<input name='nombre' type='text' placeholder='Nombre de usuario' required='' id='username' />
			</div>
			<div>
				<input name='password' type='password' placeholder='Password' required='' id='password' />
			</div>
			<div>
				<input name='enviar' type='submit' value='Log in' />
				<a href='#'>perdiste tu contraseña?</a>
				<a href='#'>Registro</a>
			</div>
		</form><!-- form -->
		<div class='button'>
		<!--	<a href=''#''>Download source file</a> -->
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->";
		
		
	}else{
		
		
		echo "Usuario :". $_SESSION["usuario"];
		echo '
		<h2>CONTENIDO</h2>
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
</table>	';
		
	}
	?>



</body></html>