<?php
	class PlazasModel extends Model{
    	public function getPlazas(){
    		$plazas = $this->db->getAll($this->table);
        	return $plazas;
    	}//getSistemas
    	
    	public function getPlazabyID($id){
    	       $prepareStatement = $this->db->prepare('SELECT * FROM PLAZAS WHERE ID_PLAZA = :ID');
    	       $prepareStatement->execute(array('ID' => $id));
    	       $result = $prepareStatement->fetchAll();
    	       return $result;   
    	}
    	
    	public function updatePlaza($id, $nombre, $descripcion , $ciudad, $estado){
    	   //$prepareStatement = $this->db->prepare("UPDATE PLAZAS SET nombre = :nombre, descripcion = :descripcion, ciudad = :ciudad, estado = :estado WHERE id_plaza = :id");  
    	   $sql = "UPDATE $this->table SET nombre = ?, descripcion = ?, ciudad = ?, estado = ? WHERE id_plaza = ?";
    	  // $sql = "INSERT INTO PLAZAS VALUES (null,'uno','dos','tres','cuatro')";
    	   $this->db->query($sql,$nombre, $descripcion , $ciudad, $estado,$id);
    	   $plazas = $this->db->getAll($this->table);
    	    return $plazas;
    	   
    	
    	   
    	}//updateSistemas */
    
    	public function insertPlaza($nombre, $descripcion, $ciudad , $estado){
    		$sql = "INSERT INTO plazas VALUES(NULL,?,?, ?, ?)";
    		if($this->db->query($sql,$nombre, $descripcion, $ciudad, $estado)) {
    		    
    		    $plazas = $this->db->getAll($this->table);
    		    return   $plazas;
    		}
    		
    		else {
    		    return $sql;
    		}
    	}//insertSistemas
    	
    	public function deletePlaza($idx){
    		$sql = "DELETE FROM $this->table WHERE ID_PLAZA = ?";
    		$this->db->query($sql, $idx);
    		$plazas = $this->db->getAll($this->table);
    		return $plazas;
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