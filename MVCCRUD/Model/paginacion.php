
<?php
/// paginacion
	require_once("../Db/Conectar.php");
$conexion=Conectar::conexion();
	$tamanop=3;
	if(isset($_GET["pagina"])){
		if($_GET["pagina"]==1){
			
			header("location:index.php");
		}else{
			$pagina=$_GET["pagina"];
		}
	}else{
	$pagina=1;
		}
	$empezarDesde=($pagina-1)*$tamanop;
		$sql="SELECT * FROM DATOS_USUARIOS";
		$resultado=$conexion->prepare($sql);
		$resultado->execute(array());
		$numfilas= $resultado->rowCount();
		$totlapaginas=ceil($numfilas/$tamanop);
	//terminapaginacion
	?>
