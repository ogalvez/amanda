<?php
	class UsuariosModel extends Model{
    	public function getUsuarios(){
    		$usuarios = $this->db->getAll($this->table);
        	return $usuarios;
    	}//getUsuarios
    
    	public function insertUsuarios($usuario, $pass, $sistemas){
    		$sql = "INSERT INTO $this->table VALUES(NULL, 0, ?, ?, 1, ?)";
    		$this->db->query($sql, $usuario, $pass, $sistemas);
    		$usuarios = $this->db->getAll($this->table);
    		return $usuarios;
    	}//insertUsuarios
    
    	public function deleteUsuarios($idx){
    		$sql = "DELETE FROM $this->table WHERE id_usuario = ?";
    		$this->db->query($sql, $idx);
    		$usuarios = $this->db->getAll($this->table);
    		return $usuarios;
    	}//deleteUsuarios
    
    	public function updateUsuarios($idx, $usuario, $pass, $status, $sistemas){
    		$sql = "UPDATE $this->table SET usuario = ?, password = ?, status = ?, sistemas = ? WHERE id_usuario = ?";
    		$this->db->query($sql, $usuario, $pass, $status, $sistemas, $idx);
    		$usuarios = $this->db->getAll($this->table);
    		return $usuarios;
    	}//updateUsuarios
	}//class UsuariosModel
?>