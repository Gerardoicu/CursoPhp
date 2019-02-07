<?php 
	$today = new DateTime(); 
$birthdate = new DateTime("2014-05-12");
$interval = $today->diff($birthdate);
echo $interval->format('%y years');	
		
		
		?>  

<!DOCTYPE html>
<html lang="en">
<head>
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
  $("input#nombre").on("keyup",function(){
	var valor=  $(this).val();
	 var fecha=Edad(valor) 
	  $("div#mensaje p").html(fecha);
  })	;
});

</script>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
Enter your name: <input id="nombre" type="date">
<div id="mensaje"><p>aqui va el valor</p></div>



</body>
</html>
