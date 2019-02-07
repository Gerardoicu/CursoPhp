<?php

class Paginacion{
	
	private $empezarDesde;
	private $tamanop;
	public function __construct() {
		$this->empezarDesde=0;
		$this->tamanop=3;
	}	
	public function setTamanop($tamanop){
		$this->tamanop=$tamanop;
		
	}
	public function getTamanop(){
		
		return $this->this;
	}
	
}




?>