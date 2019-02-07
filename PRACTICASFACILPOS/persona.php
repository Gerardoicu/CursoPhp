<?php
class Persona{

	private $nombres;
	private $apellidos;
	private $edad;
	private $password;

	public function __get($property){
			if(property_exists($this, $property)) {
        return $this->$property;
    }
	 else 
		 echo "Null";
}
	  public function __set($property,$value){
			if(property_exists($this, $property)) {
        $this->$property = $value;
    }
		else 
		 echo "Null";
}
	public function getDatos(){
		
		return "<b>Nombre(s): </b>".$this->nombres."<b> Apellidos: </b>".$this->apellidos."<b> Edad: </b>".$this->edad."<b> Password: </b>".$this->password;
	}
	public function getEdad(){
		return $this->edad;
	}
	public function getNombres(){
		return $this->nombres;
	}	
	public function getPassword(){
		return $this->password;
	}
}


?>










