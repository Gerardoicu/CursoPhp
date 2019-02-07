
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" ></script>
	<title>Usuario Login</title>
</head>
<body class="p-3 mb-2 bg-info">
<?php
require("persona.php");
session_start();
// agregar iconito a login
if(!isset($_SESSION['usuario'])){
echo '
	<br>
	 <div class="container border border-dark w-25 p-3 bg-light">

      <form action="index.php" method="post" id="datos">
		
        <h2 class="form-signin-heading text-center ">Iniciar Sesión</h2>
     <div class="form-group row">
		<span   class="col-md-1"></span>
        <input type="text" name="persona" id="persona" class="form-control col-md-10" placeholder="Usuario" required autofocus>
		<span  class="col-md-1"></span>
		 </div>
    
      <div class="form-group row">
	  <span  class="col-md-1"></span>
		  <input type="password" name="password" id="password" class="form-control col-md-10" placeholder="Contraseña" required>
       <span  class="col-md-1"></span>
	   </div>
	 <div class="form-group row">
		
	   </div>
	   <div class="form-group row text-center">
		   <div class="col">
        <button  class="btn btn-primary" type="submit">Entrar</button>
		 </div> </div>
		   <div class="form-group row">
				<div class="col"></div><div class="col">
           <a href="ejercicio1.php">Registrarse</a></div>
     </div>
      </form>

</div> ';

}else 
{
	
	header("location:ejercicio2.php");
}

if(isset($_POST['persona']) and isset($_POST['password'] ))
{
	$usuarioValido= new Persona();
	if(isset($_SESSION['personas']))
	{ 		
		$persona=array();
		$personas=$_SESSION['personas'];
		foreach($personas as $persona)
		{

		if($persona->getNombres()==$_POST['persona'])
		{


			if($persona->getPassword()==$_POST['password'])	
			{
				
				$usuarioValido=$persona;
				
				$_SESSION['usuario']=$persona;
				header('location:index.php');
			}

		}
		else
		{
		echo "No existe ese nombre de usuario";
		}
		}

	}

	else
	{
		echo "No hay ningún usuario almacenado";
	}
}
	?>
<script>
    $('#datos').validate({
		submitHandler:function(form)
		{
			form.submit();
		},
		errorClass: "text-danger",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.form-group').removeClass('has-success').addClass('has-error');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).parents('.form-group').removeClass('has-error').addClass('has-success');
			},
			rules:
			{
				
					 persona:
				{
					required:true
				
					
				},	
				password:
				{
					required:true
					
					
				},
			},
			messages:
			{					
				persona:{
                  required:"Este campo es obligatorio"
                },
				password:{
                    required:"Este campo es obligatorio"
                }
			}
	});
	</script>
</body>
</html>