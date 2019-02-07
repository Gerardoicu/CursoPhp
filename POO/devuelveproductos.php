<?php
require("estructura.php");
class DevuelProductos extends Conexion{
	public function  __construct(){
		
		parent::__construct();
	}
	
	public function getProductos(){
		
		$resultado=$this->conexion_db->query('SELECT * FROM PRODUCTOSNUEVOS');
		$productos=$resultado->fetch_all(MYSQL_ASSOC);
		
		return $productos;
		
		
		
		
	}
}
?>