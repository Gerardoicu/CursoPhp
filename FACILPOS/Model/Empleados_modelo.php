<?php
class Empleados_modelo{	
	public function __construct() {
		require_once("Db/Conectar.php");
		$this->conexion=Conectar::conexion();
		$this->empleados=array();
	}
	public function get_paginacion(){	
		$sql="SELECT * FROM datos_usuarios";
		$consulta=$this->conexion->prepare($sql);	
		$consulta->execute(array());	
		$numfilas= $consulta->rowCount();	
		return $numfilas;
	}
	public function get_promedio(){	
		$sql="SELECT AVG(SUELDOBASE) AS PROMEDIOS FROM datos_usuarios";
		$consulta=$this->conexion->prepare($sql);
		$consulta->execute();
		$r = $consulta->fetch(PDO::FETCH_OBJ);
		$empleado = new Empleado();
		$empleado->__SET('promedios',$r->PROMEDIOS);         
        return $empleado;
	
	}
	public function get_empleados($empezar_desde,$tamanop){
		try{
			//paginacion 
			$empleados = array();
			$edad="";
			$sql="SELECT ID,NOMBRE,APELLIDO,IDENTIFICACION,DIRECCION,PAISCIUDAD,SUELDOBASE,FECHANACIMIENTO FROM datos_usuarios ORDER BY ID DESC limit $empezar_desde,$tamanop";
			$consulta=$this->conexion->prepare($sql);	
			$consulta->execute();
			foreach($consulta->fetchAll(PDO::FETCH_OBJ)as $registro){
				$empleado= new Empleado;
				$empleado->__SET('id',$registro->ID);
				$empleado->__SET('nombre',$registro->NOMBRE);
				$empleado->__SET('apellido',$registro->APELLIDO);
				$empleado->__SET('identificacion',$registro->IDENTIFICACION);
				$empleado->__SET('direccion',$registro->DIRECCION);
				$empleado->__SET('paisCiudad',$registro->PAISCIUDAD);
				$empleado->__SET('sueldoBase',$registro->SUELDOBASE);
				$empleado->__SET('fechaNacimiento',$registro->FECHANACIMIENTO);
				$empleados[] = $empleado;
			}
			
		}
		catch(Exception $e)
		{
			 die($e->getMessage());
		}
		return $empleados;
	}
	public function getEmpleado($id)
    {
        try 
        {		
			$sql="SELECT * FROM datos_usuarios WHERE ID=?";
			$consulta=$this->conexion->prepare($sql);
            $consulta->execute(array($id));
            $r = $consulta->fetch(PDO::FETCH_OBJ);
            $empleado = new Empleado();
            $empleado->__SET('id',$r->ID);
            $empleado->__SET('nombre',$r->NOMBRE);
            $empleado->__SET('apellido',$r->APELLIDO);
			$empleado->__SET('identificacion',$r->IDENTIFICACION);
            $empleado->__SET('direccion', $r->DIRECCION);
			$empleado->__SET('paisCiudad',$r->PAISCIUDAD);
			$empleado->__SET('sueldoBase',$r->SUELDOBASE);
			$empleado->__SET('fechaNacimiento',$r->FECHANACIMIENTO);        
        } 
		catch (Exception $e) 
        	{
				die($e->getMessage());
			}
		return $empleado;
    }
	public function insertar_empleado(Empleado $empleado){	
		try{	
		$conexion=$this->conexion=Conectar::conexion();
		$sql="INSERT INTO DATOS_USUARIOS (nombre,apellido,identificacion,direccion,paisciudad,sueldobase,fechanacimiento) VALUES(:nom,:ape,:ide,:dir,:pc,:suel,:fec)";
		$resultado=$conexion->prepare($sql);
		$resultado->execute(array(":nom"=>$empleado->__get('nombre'),":ape"=>$empleado->__get('apellido'),":ide"=>$empleado->__get('identificacion'),":dir"=>$empleado->__get('direccion'),":pc"=>$empleado->__get('paisCiudad'),":suel"=>$empleado->__get('sueldoBase'),":fec"=>$empleado->__get('fechaNacimiento')));	
		}
		catch(Exception $e)
			{
				die($e->getMessage());
	    	}
				
	 }
	public function borrar_empleado($id){
		try{
			$conexion=$this->conexion=Conectar::conexion();			
			$sql="DELETE FROM datos_usuarios WHERE ID=:id";
			$resultado=$conexion->prepare($sql);
			$resultado->execute(array(":id"=>$id));
		}
		catch(Exception $e)
		{
			 die($e->getMessage());
		}
	}
	public function editar_empleado(Empleado $empleado){
		try{
			$conexion=$this->conexion=Conectar::conexion();	
			$sql="UPDATE datos_usuarios set nombre=:miNom,apellido=:miApe,identificacion=:ide,direccion=:miDir,paisciudad=:pc,sueldobase=:suel,fechanacimiento=:fec WHERE id=:miId";
			$resultado=$conexion->prepare($sql);
			$resultado->execute(array(":miId"=>$empleado->__GET('id'),":miNom"=>$empleado->__GET('nombre'),":miApe"=>$empleado->__GET('apellido'),":ide"=>$empleado->__GET('identificacion'),":miDir"=>$empleado->__GET('direccion'),":pc"=>$empleado->__GET('paisCiudad'),":suel"=>$empleado->__GET('sueldoBase'),":fec"=>$empleado->__GET('fechaNacimiento')));
		}
		catch(Exception $e)
			{
			  die($e->getMessage());
			
			}
	}
	

}
?>
