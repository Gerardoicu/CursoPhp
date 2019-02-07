
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
<body>
	
	 <div class="container border border-primary w-25 p-3">

      <form>
		
        <h2 class="form-signin-heading text-center ">Iniciar Sesión</h2>
     <div class="form-group row">
		
        <input type="correo" id="correo" class="form-control" placeholder="Correo Eletrónico" required autofocus>
		  </div>
    
      <div class="form-group row">
		  <input type="password" id="password" class="form-control" placeholder="Contraseña" required>
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

    </div> <!-- /container -->
	
</body>
</html>