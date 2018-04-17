<?php
	class SistemasModel extends Model{
    	public function getSistemas(){
    		$sistemas = $this->db->getAll($this->table);
        	return $sistemas;
    	}//getSistemas
    
    	public function insertSistemas($sistema, $codigo){
    		$sql = "INSERT INTO $this->table VALUES(NULL, ?, ?)";
    		$this->db->query($sql, $sistema, $codigo);
    		$sistemas = $this->db->getAll($this->table);
    		return $sistemas;
    	}//insertSistemas
    
    	public function deleteSistemas($idx){
    		$sql = "DELETE FROM $this->table WHERE id_sistema = ?";
    		$this->db->query($sql, $idx);
    		$sistemas = $this->db->getAll($this->table);
    		return $sistemas;
    	}//deleteSistemas
    
    	public function updateSistemas($idx, $sistema, $codigo){
    		$sql = "UPDATE $this->table SET sistema = ?, codigo = ? WHERE id_sistema = ?";
    		$this->db->query($sql, $sistema, $codigo, $idx);
    		$sistemas = $this->db->getAll($this->table);
    		return $sistemas;
    	}//updateSistemas
	}//class SistemasModel
?>