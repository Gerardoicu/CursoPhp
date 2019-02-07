<?php
class Productos_modelo{
	private $db;
	private $productos;
	public function __construct() {
		require_once("Model/Conectar.php");
		$this->db=Conectar::conexion();
		$this->productos=array();
	}
	public function get_productos(){
		echo "esto es ".$this->db->query("SELECT * FROM productos");	
		$consulta=$this->db->query("SELECT * FROM productos");	
		while($filas=$consulta->fetch(PDO::FETCH_ASSOC))
		{
			$this->productos[]=$filas;
		}
		return $this->productos;
	}
}
?>
