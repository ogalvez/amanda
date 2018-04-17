<?php
    class GirosModel extends Model{
    	public function getGiros(){
            $result = $this->db->getAll($this->table);
            return $result;
    	}//getGiros
    
    	public function insertGiros($nombre){
            $sql = "SELECT CODIGO_GIRO FROM $this->table ORDER BY CODIGO_GIRO DESC";
            $result = $this->db->getOne($sql);
            $sql = "INSERT INTO $this->table VALUES(?, ?)";
            $this->db->query($sql, $result + 1, $nombre);
            $result = $this->db->getAll($this->table);
            return $result;
    	}//insertGiros
    
    	public function deleteGiros($id){
            $sql = "DELETE FROM $this->table WHERE CODIGO_GIRO = ?";
            $this->db->query($sql, $id);
            $result = $this->db->getAll($this->table);
            return $result;
    	}//deleteGiros
    
    	public function updateGiros($id, $nombre){
            $sql = "UPDATE $this->table SET NOMBRE = ? WHERE CODIGO_GIRO = ?";
            $this->db->query($sql, $nombre, $id);
            $result = $this->db->getAll($this->table);
            return $result;
    	}//updateUsuarios
        
        public function retriveGiros($id){
            $sql = "SELECT * FROM $this->table WHERE CODIGO_GIRO = ?";
            $result = $this->db->queryAllById($sql, $id);
            return $result;
        }//retriveGiros
        
        public function getSelectedColumns(){
            $sql = "SELECT CODIGO_GIRO, NOMBRE FROM $this->table";
            $result = $this->db->queryAllById($sql);
            return $result;
        }//getSelectedColumns
    }//class GirosModel
?>