<?php
if($_POST["comentarios"]=="" ||$_POST["nombre"]=="" ||$_POST["apellido"]=="" || $_POST["email"]=="" || $_POST["asunto"]=="")
{
	echo "uno o mas campos está vacío";
	
	die();
}
$texto_mail=$_POST["comentarios"];
$destinatario=$_POST["email"];
$asunto=$_POST["asunto"];
$headers="MIME-Version:1.0\r\n";
$headers.="Content-type: text/html; charset=iso-8859-1\r\n";	
$headers.="From: Prueba Gerardo < gerardoicu@gmail.com>\r\n";
$exito=mail($destinatario,$asunto,$texto_mail,$headers);


if($exito){
	
	
echo "Mensaje enviado con éxito";
}
else{
	
	echo "ha habido un error";
}
	?>