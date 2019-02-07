

<?php
// Autor: Gerardo Ivanhoe Carvajal Uscanga

//Cargamos la clase persona que es indispensable para poder crear los objetos que se van a necesitar.
include("persona.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ejercicio Uno</title>
</head>
<body>
	<br>
	<form action="ejercicio1.php" method="POST" required>
	Nombres:<input name="nombres" placeholder='Nombre(s)' type="text" required>	
	Apellidos:<input name="apellidos" placeholder='Apellidos' type="text" required>
	Edad: <input name="edad" placeholder='Edad' type="number" >
		  <button type="submit" >Guardar</button>
	</form>
<?php
	
	$personas=array();
	// le decimos a php que vamos a trabajar con sesiones
		session_start();
	// revisamos si existe una sesion para poder cargar los valores que guardamos previamente
		if(isset($_SESSION["personas"])){
			$personas=$_SESSION["personas"];
			if(isset($_POST["nombres"])){
			$obj1= new Persona($_POST["nombres"],$_POST["apellidos"],$_POST["edad"]);
			array_push($personas,$obj1);
			}
			$_SESSION["personas"]=$personas;
					
	

		}else{
			//En caso de que no exista una primera sesión creamos el objeto y cargamos la sesión con lo mandamos con POST
			if(isset($_POST["nombres"])){
				$obj1= new Persona($_POST["nombres"],$_POST["apellidos"],$_POST["edad"]);
				array_push($personas,$obj1);
				$_SESSION["personas"]=$personas;
			}
		}
	//si alguno de las dos variables existe debe mostrar un valor en pantalla
	if(isset($_SESSION["personas"]) or isset($_POST["nombres"])){
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
</body>
</html>