<?php
class Alumno
{
    private $id;
    private $nombre;
    private $apellido;
    private $sexo;
    private $fechaNacimiento;

   public function __get($property){
   
        return $this->$property;
    
}
    public function __set($property,$value){
    
        $this->$property = $value;
    }
		

}


$alumno= new Alumno;
$alumno->__set("nombre","Gerardo Carvajal");
print($alumno->__get("nombre"));
?>