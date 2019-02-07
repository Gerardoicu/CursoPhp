

<?php
// Autor: Gerardo Ivanhoe Carvajal Uscanga
include("productos.php");
session_start();
//Cargamos la clase persona que es indispensable para poder crear los objetos que se van a necesitar.

// crear clase Producto
// cambiar clase persona por clase Producto y agregar los demas campo de el formulario
//crer otra cookie para logear
// crear formulario login
// validar formulario backend y front
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" ></script>
	<title>Ejercicio Dos</title>
</head>
<body class="p-3 mb-2 bg-info">
	<h3 class="text-center"><b>INGRESE SU PRODUCTO</b></h3>
	 <br>
<div class="container border border-primary p-3 mb-2 bg-dark text-white">
 <br>
<form action="ejercicio2.php" method="POST" class="text-center" required id="datos">
	
	<div class="row">
		<div class="col">
		<b>	<label for="isbn">ISBN:</label></b>
			<input  type="text" class="form-control text-center"  id="isbn" name="isbn" placeholder='ISBN' required>
<b>	<label for="tamano">Tamaño:</label></b>
			<input  type="text" id="tamano"  class="form-control text-center" name="tamano" placeholder='Tamaño' required>
		

				
		</div>
		<div class="col">
		<b>	<label for="isbn">Nombre:</label></b>
			<input  type="text" class="form-control text-center" id="nombre" name="nombre" placeholder='Nombre' required>

		<b>	<label for="color">Color:</label></b>	
			<input  type="text"   class="form-control text-center" id="color" name="color" placeholder='Color' required>

			
		</div>
		<div class="col">
		<b>	<label for="costo">Costo:</label></b>
			<input  type="number"  class="form-control text-center" id="costo" name="costo" placeholder='Costo' required>

		<b>	<label for="cantidad">Cantidad en Stock:</label></b>
			<input  type="number"   class="form-control text-center" id="cantidad" name="cantidad" placeholder='Cantidad en Stock' required>

		<b>	<label for="precio">Precio:</label></b>
			<input  type="number"  class="form-control text-center" id="precio" name="precio" placeholder='Precio de venta' required>
		</div>
		<div class="col">
			<b>	<label for="ganancia">Ganancia:</label></b>
			<input  type="number"  class="form-control text-center" id="ganancia" name="ganancia" placeholder='Ganancia' required>
			

			<b>	<label for="cantidadB">Cantidad en Bodega:</label></b>
				<input  type="number" class="form-control text-center"  id="cantidadB" name="cantidadB" placeholder='Cantidad en Bodega' required>
			</div>
		
		<div class="col">
			<b>	<label for="categoria">Categoria:</label></b>
			<input  type="text"  id="categoria"  class="form-control text-center" name="categoria" placeholder='Categoría' required>
			<b><label for="fecha">Fecha:</label></b>	
			<input  type="date" class="form-control text-center" id="fecha" name="fecha" placeholder='Fecha' required>
		</div>
	</div><br>
		<button class="btn btn-primary" type="submit" ><b>Guardar</b></button>
	
		</form>
	 <br>
</div>
	 <br>
<?php
	
	$productos=array();
	// le decimos a php que vamos a trabajar con sesiones
		
	// revisamos si existe una sesion para poder cargar los valores que guardamos previamente
		if(isset($_SESSION["productos"])){
			$productos=$_SESSION["productos"];
			if(isset($_POST["isbn"])){
			$obj1= new Productos($_POST["isbn"],$_POST["nombre"],$_POST["categoria"],$_POST["tamano"],$_POST["color"],$_POST["fecha"],$_POST["costo"],$_POST["ganancia"],$_POST["precio"],$_POST["cantidad"],$_POST["cantidadB"]);
			array_push($productos,$obj1);
			}
			$_SESSION["productos"]=$productos;
					
	

		}else{
			//En caso de que no exista una primera sesión creamos el objeto y cargamos la sesión con lo mandamos con POST
			if(isset($_POST["isbn"])){
				$obj1= new Productos($_POST["isbn"],$_POST["nombre"],$_POST["categoria"],$_POST["tamano"],$_POST["color"],$_POST["fecha"],$_POST["costo"],$_POST["ganancia"],$_POST["precio"],$_POST["cantidad"],$_POST["cantidadB"]);
				array_push($productos,$obj1);
				$_SESSION["productos"]=$productos;
			}
		}
	//si alguno de las dos variables existe debe mostrar un valor en pantalla
	
	if(isset($_SESSION["productos"]) or isset($_POST["isbn"])){
		echo "<table class='table table-bordered table-hover table-dark'>
		 		<thead class='bg-primary'>
						<tr>
							<th scope='col'>ISBN</th>
							<th scope='col'>Nombre</th>
      						<th scope='col'>Categoria</th>
      						<th scope='col'>Tamaño</th>
							<th scope='col'>Color</th>
							<th scope='col'>Fecha</th>
							<th scope='col'>Costo</th>
							<th scope='col'>Ganancia</th>
							<th scope='col'>Precio</th>
							<th scope='col'>Stock</th>
							<th scope='col'>Stock Bodega</th>
    					</tr>
  				</thead>
				<tbody> <tr>";
		foreach($productos as $producto){
				echo "<td>".$producto->__get("isbn")."</td>";
				echo "<td>".$producto->__get("nombre")."</td>";
				echo "<td>".$producto->__get("categoria")."</td>";
				echo "<td>".$producto->__get("tamano")."</td>";
				echo "<td>".$producto->__get("color")."</td>";
				echo "<td>".$producto->__get("fecha")."</td>";
				echo "<td>".$producto->__get("costo")."</td>";
				echo "<td>".$producto->__get("ganancia")."</td>";
				echo "<td>".$producto->__get("precio")."</td>";
				echo "<td>".$producto->__get("stock")."</td>";
				echo "<td>".$producto->__get("stockB")."</td> </tr> </tbody>";
			
					
				}
		echo "</table>";
	}
	else{
		echo "No ha guardado ningún valor";
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
				isbn:{
                  required: true
                },
				nombre:{
                  required: true
                },
				categoria:{
                  required: true
                },
				tamano:{
                  required: true
                },
				color:{
                  required: true
                },
				fecha:{
                  required: true
                },
				
                costo:
				{
					required:true,
					number:true
					
				},
				 ganancia:
				{
					required:true,
					number:true
					
				},
					 precio:
				{
					required:true,
					number:true
					
				},
					 cantidad:
				{
					required:true,
					number:true
					
				},	
				cantidadB:
				{
					required:true,
					number:true
					
				},
			},
			messages:
			{					
				isbn:{
                  required:"Este campo es obligatorio"
                },
				nombre:{
                    required:"Este campo es obligatorio"
                },
				categoria:{
                    required:"Este campo es obligatorio"
                },
				tamano:{
                   required:"Este campo es obligatorio"
                },
				color:{
                   required:"Este campo es obligatorio"
                },
				fecha:{
                  required:"Este campo es obligatorio"
                },
				
                costo:
				{
					required:"Este campo es obligatorio",
					number:"Ingrese una cantidad Válida"
					
				},
				 ganancia:
				{
					required:"Este campo es obligatorio",
					number:"Ingrese una cantidad Válida"
					
				},
					 precio:
				{
					required:"Este campo es obligatorio",
					number:"Ingrese una cantidad Válida"
					
				},
					 cantidad:
				{
					required:"Este campo es obligatorio",
					number:"Ingrese una cantidad Válida"
					
				},	
				cantidadB:
				{
					required:"Este campo es obligatorio",
					number:"Ingrese una cantidad Válida"
					
				},
				edad:{
					number:"ingrese una edad válida",
					required: "La edad es obligatoria"
				}
			}
	});
	</script>
</body>
</html>