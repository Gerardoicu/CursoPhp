<?php
class Persona{
	private $id;
	private $nombre;
	private $apellido;
	private $direccion;
	
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
	
}


?>