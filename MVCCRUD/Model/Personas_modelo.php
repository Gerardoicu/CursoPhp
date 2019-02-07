<?php
class Personas_modelo{	
	public function __construct() {
		require_once("Db/Conectar.php");
	
		$this->conexion=Conectar::conexion();
		$this->personas=array();
	}
	public function get_personas(){
		try{
			
			
			$personas = array();
			$sql="SELECT * FROM datos_usuarios";
			$consulta=$this->conexion->prepare($sql);	
			$consulta->execute();
			foreach($consulta->fetchAll(PDO::FETCH_OBJ)as $registro){
				$persona= new Persona;
				$persona->__SET('id',$registro->ID);
				$persona->__SET('nombre',$registro->NOMBRE);
				$persona->__SET('apellido',$registro->APELLIDO);
				$persona->__SET('direccion',$registro->DIRECCION);
				$personas[] = $persona;
			}
			return $personas;
		}
		catch(Exception $e){
			 die($e->getMessage());
		}
	}
	public function getPersona($id)
    {
        try 
        {	
			
			$sql="SELECT * FROM datos_usuarios WHERE ID=?";
			$consulta=$this->conexion->prepare($sql);
            $consulta->execute(array($id));
            $r = $consulta->fetch(PDO::FETCH_OBJ);
            $persona = new Persona();
            $persona->__SET('id',$r->ID);
            $persona->__SET('nombre',$r->NOMBRE);
            $persona->__SET('apellido',$r->APELLIDO);
            $persona->__SET('direccion', $r->DIRECCION);

            return $persona;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
	public function insertar_persona(Persona $persona){	
		
		try{	
		$conexion=$this->conexion=Conectar::conexion();
		$sql="INSERT INTO DATOS_USUARIOS (nombre,apellido,direccion) VALUES(:nom,:ape,:dir)";
		$resultado=$conexion->prepare($sql);
		$resultado->execute(array(":nom"=>$persona->__get('nombre'),":ape"=>$persona->__get('nombre'),":dir"=>$persona->__get('direccion')));	
}
	catch(Exception $e){
		 die($e->getMessage());
	}
				
	 }
	public function borrar_persona($id){
		try{
			$conexion=$this->conexion=Conectar::conexion();
			
			$sql="DELETE FROM datos_usuarios WHERE ID=:id";
			$resultado=$conexion->prepare($sql);
			$resultado->execute(array(":id"=>$id));
		}
		catch(Exception $e){
			 die($e->getMessage());
						   }
	}
	public function editar_persona(Persona $data){
		try{
		$conexion=$this->conexion=Conectar::conexion();	
		$sql="UPDATE datos_usuarios set nombre=:miNom,apellido=:miApe,direccion=:miDir WHERE id=:miId";
		$resultado=$conexion->prepare($sql);
		$resultado->execute(array(":miId"=>$data->__GET('id'),":miNom"=>$data->__GET('nombre'),":miApe"=>$data->__GET('apellido'),":miDir"=>$data->__GET('direccion')));
		}
		catch(Exception $e){
			  die($e->getMessage());
			
		}
	}
	

}
?>
