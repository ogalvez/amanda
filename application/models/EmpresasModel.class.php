<?php
	class EmpresasModel extends Model{
    	public function getEmpresas(){
    		$empresas = $this->db->getAll($this->table);
        	return $empresas;
    	}//getSistemas
    	
    	public function getEmpresabyID($id){
    	       $prepareStatement = $this->db->prepare('SELECT * FROM empresas WHERE ID = :ID');
    	       $prepareStatement->execute(array('ID' => $id));
    	       $result = $prepareStatement->fetchAll();
    	       return $result;   
    	}
    	
    	public function updateEmpresa($id, $clave, $tipo, $descripcion, $plaza){
    	   //$prepareStatement = $this->db->prepare("UPDATE PLAZAS SET nombre = :nombre, descripcion = :descripcion, ciudad = :ciudad, estado = :estado WHERE id_plaza = :id");  
    	   $sql = "UPDATE $this->table SET CLAVE_M = ?, TIPO= ?,  DESCRIPCION= ? , PLAZA_ID_PLAZA = ? WHERE ID = ?";
    	  // $sql = "INSERT INTO PLAZAS VALUES (null,'uno','dos','tres','cuatro')";
    	   $this->db->query($sql,$clave, $tipo, $descripcion, $plaza,$id);
    	   $empresas = $this->db->getAll($this->table);
    	   return  $empresas;
    	   
    	
    	   
    	}//updateSistemas */
    
    	public function insertEmpresa($clave, $tipo, $descripcion, $plaza){
    	    $today = '2018-04-03';
    		$sql = "INSERT INTO empresas VALUES(NULL,?,?,?, ?, ?)";
    		if($this->db->query($sql,$today,$clave, $tipo, $descripcion, $plaza)) {
    		    
    		    $empresas = $this->db->getAll($this->table);
    		    return   $empresas;
    		}
    		
    		else {
    		    return $sql;
    		}
    	}//insertSistemas
    	
    	public function deleteEmpresa($idx){
    		$sql = "DELETE FROM $this->table WHERE ID = ?";
    		$this->db->query($sql, $idx);
    		$empresas = $this->db->getAll($this->table);
    		return $empresas;
    	}//deleteSistemas
        /*
    	public function updateSistemas($idx, $sistema, $codigo){
    		$sql = "UPDATE $this->table SET sistema = ?, codigo = ? WHERE id_sistema = ?";
    		$this->db->query($sql, $sistema, $codigo, $idx);
    		$sistemas = $this->db->getAll($this->table);
    		return $sistemas;
    	}//updateSistemas */
	}//class SistemasModel
?>