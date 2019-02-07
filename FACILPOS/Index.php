
<?php
require_once 'Model/Empleado.php';
require_once 'Model/Empleados_modelo.php';
// paginacion
$tamanop=4;
if(isset($_GET["pagina"])){
		if($_GET["pagina"]==1){
			
			header("location:Index.php");
		}else{
			$pagina=$_GET["pagina"];
		}}
else{
$pagina=1;
	}

//termina paginacion
//instancias
$Empleado = new Empleado();
$modelo = new Empleados_modelo();
// post
if(isset($_REQUEST['action']))
{
	
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $Empleado->__SET('id',              $_REQUEST['id']);
            $Empleado->__SET('nombre',          $_REQUEST['Nombre']);
            $Empleado->__SET('apellido',        $_REQUEST['Apellido']);
			$Empleado->__SET('identificacion',  $_REQUEST['Identificacion']);
            $Empleado->__SET('direccion',       $_REQUEST['Direccion']);
			$Empleado->__SET('paisCiudad',      $_REQUEST['CiudadPais']);
			$Empleado->__SET('sueldoBase',      $_REQUEST['SueldoBase']);
			$Empleado->__SET('fechaNacimiento', $_REQUEST['FechaNacimiento']);	
            $modelo->editar_Empleado($Empleado);
           // header('Location: index.php');
			
				
				
            break;

        case 'registrar':
            $Empleado->__SET('nombre',              $_REQUEST['Nombre']);
            $Empleado->__SET('apellido',            $_REQUEST['Apellido']);      
           	$Empleado->__SET('identificacion',      $_REQUEST['Identificacion']);
			$Empleado->__SET('direccion',           $_REQUEST['Direccion']);
			$Empleado->__SET('paisCiudad',          $_REQUEST['CiudadPais']);
			$Empleado->__SET('sueldoBase',          $_REQUEST['SueldoBase']);
			$Empleado->__SET('fechaNacimiento',     $_REQUEST['FechaNacimiento']);
            $modelo->insertar_Empleado($Empleado);
           // header('Location: index.php');
            break;

        case 'eliminar':
            $modelo->borrar_Empleado($_REQUEST['id']);
           // header('Location: index.php');
            break;

        case 'editar':
            $Empleado = $modelo->getEmpleado($_REQUEST['id']);
			 //header('Location: index.php');
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
        <title>FACILPOS</title>
			<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
      		<link rel="stylesheet" href="css/style.css">
			<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	function Edad(FechaNacimiento) {
    var fechaNace = new Date(FechaNacimiento);
    var fechaActual = new Date()
    var mes = fechaActual.getMonth();
    var dia = fechaActual.getDate();
    var año = fechaActual.getFullYear();
    fechaActual.setDate(dia);
    fechaActual.setMonth(mes);
    fechaActual.setFullYear(año);
    edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));
    return edad;
	
	 
}

	</script>
<script type="text/javascript">

$(document).ready(function(){
  $("input#FechaNacimiento").on("blur keyup change",function(){
   var valor=  $(this).val();
	 var fecha=Edad(valor) 
      $("div#mensaje p").html(fecha+ " años");
  });
});


</script>
	</head>
    	<body >
	<header>
		<nav>
			<ul>
				<li><h1>FACILPOS, Diseño y Desarrollo Software.</h1> </li>					
			</ul>
		</nav>					
	</header>
		<section class="main">
			<section class="articles">
				<article>
                	<h2>Registra un nuevo Empleado</h2><br>
                	<form action="?action=<?php echo $Empleado->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    	<input type="hidden" name="id" value="<?php echo $Empleado->__GET('id'); ?>" />
                    
                    	<table >
                        	<tr>
                            <th >Nombre:</th>
                            <td><input type="text" name="Nombre" value="<?php echo $Empleado->__GET('nombre'); ?>"  required/></td>
                      
                            <th >Apellido:</th>
                            <td><input type="text" name="Apellido" value="<?php echo $Empleado->__GET('apellido'); ?>"  required/></td>
                        
                            <th >Identificación:</th>
                            <td><input type="text" name="Identificacion" value="<?php echo $Empleado->__GET('identificacion'); ?>"  required/></td>
                        	</tr>
                        	<tr>
                            <th >Dirección:</th>
                            <td><input type="text" name="Direccion" value="<?php echo $Empleado->__GET('direccion'); ?>"  required/></td>
                        
                            <th >Ciudad y país:</th>
                            <td><input type="text" name="CiudadPais" value="<?php echo $Empleado->__GET('paisCiudad'); ?>"  required/></td>
                      
                            <th >Sueldo:</th>
                            <td><input type="number" name="SueldoBase" value="<?php echo $Empleado->__GET('sueldoBase'); ?>"  required/></td>
                       		</tr>
							<tr>
                            <th >Fecha de Nacimiento</th>
                            <td><input type="date" id="FechaNacimiento" name="FechaNacimiento" value="<?php echo $Empleado->__GET('fechaNacimiento'); ?>"  required/>
								
								</td>
								 <th >Edad:</th>
                       <td> <div id="mensaje"><p>
						 	
		
				   <?php 
							$today = new DateTime(); 
						   $birthdate = new DateTime($Empleado->__GET('fechaNacimiento'));
						   $interval = $today->diff($birthdate);
						   echo $interval->format('%y años');	
					  ?>	  
				
					
						
						 </p> </div></td>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Registrar</button>
                            </td>
                        	</tr>
                    	</table>
                	</form>
				</article>
		</section>
                <table id="empleados" class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th >Nombre: </th>
                            <th >Apellido:</th> 
							<th >Identificación:</th>
                            <th >Dirección:</th>
							<th >Ciudad y País:</th>
							<th >Salario:</th>
							<th >Fecha de Nacimiento:</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
<?php
$empezarDesde=($pagina-1)*$tamanop;

foreach($modelo->get_Empleados($empezarDesde,$tamanop) as $r):
?>
				<tr>
					<td><?php echo $r->__GET('nombre'); ?></td>
					<td><?php echo $r->__GET('apellido'); ?></td>  
					<td><?php echo $r->__GET('identificacion'); ?></td>    
					<td><?php echo $r->__GET('direccion'); ?></td>
					<td><?php echo $r->__GET('paisCiudad'); ?></td> 
					<td><?php echo $r->__GET('sueldoBase'); ?></td> 
					<td><?php echo $r->__GET('fechaNacimiento'); ?></td>    
					<td>
						<a href="?action=editar&id=<?php echo $r->__GET('id'); ?>">Editar</a>
						</td>
					<td>
						<a href="?action=eliminar&id=<?php echo $r->__GET('id'); ?>">Eliminar</a></td> 
				</tr>
<?php endforeach; ?>
				 <tr>
					<td></td>
					<td>
<?php		
	$numfilas= $modelo->get_paginacion();
	$totlapaginas=ceil($numfilas/$tamanop);
	for($i=1;$i<=$totlapaginas;$i++)
		{
		echo "       <a href='?pagina=".$i."#empleados'>  " .$i. "    </a>";
		}
?>
						
					</td>
					<td></td>							
					<td></td>
					<td><h3>Promedio Salario:</h3></td>
					<td>
<?php
	$ep= $modelo->get_promedio();	
	echo number_format($ep->__GET('promedios'),2,",",".");
?>
					</td>
					<td></td>
					<td></td>	
			     </tr>
             </table>     
					
<?php   
	echo "<br>página $pagina de  $totlapaginas";
?>
		
	<aside>					</aside>
	<footer><p>Desarrollado por: Gerardo Ivanhoe Carvajal Uscanga</p></footer>
</body>
</html>