<?php
class Productos{

	private $isbn;
	private $nombre;
	private $categoria;
	private $tamano;
	private $color;
	private $fecha;
	private $costo;
	private $ganancia;
	private $precio;
	private $stock;
	private $stockB;
	function __construct($isbn,$nombre,$categoria,$tamano,$color,$fecha,$costo,$ganancia,$precio,$stock,$stockB)
	{
		$this->isbn=$isbn;
		$this->nombre=$nombre;
		$this->categoria=$categoria;
		$this->tamano=$tamano;
		$this->color=$color;
		$this->fecha=$fecha;
		$this->costo=$costo;
		$this->ganancia=$ganancia;
		$this->precio=$precio;
		$this->stock=$stock;
		$this->stockB=$stockB;
	}
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









