<?php
class Empleado{
	private $id;
	private $nombre;
	private $apellido;
	private $identificacion;
	private $direccion;
	private $paisCiudad;
	private $sueldoBase;
	private $fechaNacimiento;
	private $promedios;
	private $paginacion;
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
