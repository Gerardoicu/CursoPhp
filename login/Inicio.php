<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
   
    <title>Inicio</title>

    <!-- Bootstrap -->
    <link href="../../css/bootstrap-4.0.0.css" rel="stylesheet">

  </head>
  <body>
   <?php
	  session_start();
	  if(!isset($_SESSION["usuario"]))
	  {
		  	header("location:login.html");
		  
		  
	  }
	  ?>
<?php
	echo "Bievenido ". $_SESSION["usuario"];  
	  ?>
	  
	  </br> <a href="destroy.php">Cerrar Sesión</a>
    <div class="jumbotron jumbotron-fluid text-center">
       <h1 class="display-4">Bootstrap with Dreamweaver</h1>
       
    </div>
  <table width="200" border="1">
  <tbody>
    <tr>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
    </tr>
  </tbody>
</table>



  </body>
</html>
