<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<title>Documento sin título</title>

</head>

<body>
	<div id="container" class="">
	
	<form action="guardar.php"  method="post" enctype="multipart/form-data">
		
	Nombre:<input name="nombre" placeholder='Nombre' type="text" required>
	Apellido:<input name="apellido" placeholder='Apellido' type="text" required>
	Edad: <input name="edad" placeholder='Edad' type="number" >
		  <button type="submit" >Guardar</button>
		</form>
	</div>
	<script>	
	$('#datos').validate({ 		submitHandler:function(form) 	
							  { 			form.submit(); 		}, 		
							  errorClass: "text-danger", 		
							  errorElement: "span", 		
							  highlight:function(element, errorClass, validClass) { 			$(element).parents('.form-group').removeClass('has-success').addClass('has-error'); 
																				  }, 			unhighlight: function(element, errorClass, validClass) { 				$(element).parents('.form-group').removeClass('has-error').addClass('has-success'); 			}, 			rules: 			{ 				
																					  nombre:{                   required: true	 } 
			  </script>
</body>
</html>