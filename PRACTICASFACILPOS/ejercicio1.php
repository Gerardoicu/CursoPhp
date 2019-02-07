

<?php
// Autor: Gerardo Ivanhoe Carvajal Uscanga

//Cargamos la clase persona que es indispensable para poder crear los objetos que se van a necesitar.
include("persona.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" ></script>

	<title>Ejercicio Uno</title>
</head>
<body class="bg-info">
	<br>
	<form action="ejercicio1.php" method="POST" required>
	Nombres:<input name="nombres" placeholder='Nombre(s)' type="text" required>	
	Apellidos:<input name="apellidos" placeholder='Apellidos' type="text" required>
	Edad: <input name="edad" placeholder='Edad' type="number" >
	Password: <input name="password" placeholder='Password' type="password" >
		  <button class="btn btn-primary" type="submit" >Guardar</button>
	</form>
<?php
	
	$personas=array();
	// le decimos a php que vamos a trabajar con sesiones
		session_start();
	// revisamos si existe una sesion para poder cargar los valores que guardamos previamente
		if(isset($_SESSION["personas"])){
			$personas=$_SESSION["personas"];
			if(isset($_POST["nombres"])){
			$obj1= new Persona();
			$obj1->__set("nombres",$_POST["nombres"]);
			$obj1->__set("apellidos",$_POST["apellidos"]);
			$obj1->__set("edad",$_POST["edad"]);
			$obj1->__set("password",$_POST["password"]);
			array_push($personas,$obj1);
			}
			$_SESSION["personas"]=$personas;
					
		header("index.php");

		}else{
			//En caso de que no exista una primera sesión creamos el objeto y cargamos la sesión con lo mandamos con POST
			if(isset($_POST["nombres"])){
				$obj1= new Persona();
				$obj1->__set("nombres",$_POST["nombres"]);
				$obj1->__set("apellidos",$_POST["apellidos"]);
			    $obj1->__set("edad",$_POST["edad"]);
			    $obj1->__set("password",$_POST["password"]);
				array_push($personas,$obj1);
				
				$_SESSION["personas"]=$personas;
				header("index.php");
			}
		}
	//si alguno de las dos variables existe debe mostrar un valor en pantalla
	if(isset($_SESSION["personas"]) or isset($_POST["nombres"])){
		echo "<b> Usuarios Registrados :</b><br>";
		foreach($personas as $persona){
				echo $persona->getDatos()."<br>";
				}
			$edades=0;
			$key=0;
			$edadesarray=array();
		// Lleno un arreglo que contenga todas las edades para poder usar la funcion max
			foreach($personas as $persona){
				array_push($edadesarray,$persona->getEdad());
				}
		// recorro el arreglo de las edades para encontrar la key de el valor mas alto
			for($i=0; $i<count($edadesarray); $i++){
				if($edadesarray[$i]==max($edadesarray)){
						$key=$i;
				}	
			}
		// determino el promedio por medio de las funciones array_sum y count
			$promedio=array_sum($edadesarray)/count($personas);
		
			echo "El promedio de edad es: ".$promedio. "<br>";
			echo "La edad mas alta es la de: ".$personas[$key]->getNombres(). " con ".$personas[$key]->getEdad();
	}
	else{
		echo "No ha guardado ningún valor";
	}
	?>
	<br>
	<a class="text-warning" href="index.php">Regresar</a>
</body>
</html>