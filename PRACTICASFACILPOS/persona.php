<?php
class Persona{

	private $nombres;
	private $apellidos;
	private $edad;
	
	function __construct($nombres,$apellidos,$edad)
	{
		$this->nombres=$nombres;
		$this->apellidos=$apellidos;
		$this->edad=$edad;
		
	}
	public function getDatos(){
		
		return "<b>Nombre(s): </b>".$this->nombres."<b> Apellidos: </b>".$this->apellidos."<b> Edad: </b>".$this->edad;
	}
	public function getEdad(){
		return $this->edad;
	}
	public function getNombres(){
		return $this->nombres;
	}	
}

 $juan=new Persona("Gerardo Ivanhoe","Carvajal Uscanga",30);
$juan->getDatos();
?>










