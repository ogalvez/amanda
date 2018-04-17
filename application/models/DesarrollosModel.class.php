<?php
    class DesarrollosModel extends Model{
    	public function getDesarrollos(){
            $result = $this->db->getAll($this->table);
            return $result;
    	}//getDesarrollos
    
    	public function insertDesarrollos($nombre, $razon, $calle, $interior, $exterior, $cp, $colonia, $localidad, $municipio, $estado, $pais, $rfc, $telefono, $idTrib, $paginaWeb, $correo, $giro){
            $sql = "SELECT CODIGO_DESARROLLO FROM desarrollos ORDER BY CODIGO_DESARROLLO DESC";
            $result = $this->db->getOne($sql);
            $sql = "INSERT INTO $this->table VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->db->query($sql, $result + 1, $nombre, $razon, $calle, $interior, $exterior, $cp, $colonia, $localidad, $municipio, $estado, $pais, $rfc, $telefono, $idTrib, $paginaWeb, $correo, 1);
            $result = $this->db->getAll($this->table);
            return $result;
    	}//insertDesarrollos
    
    	public function deleteDesarrollos($id){
            $sql = "DELETE FROM $this->table WHERE CODIGO_DESARROLLO = ?";
            $this->db->query($sql, $id);
            $result = $this->db->getAll($this->table);
            return $result;
    	}//deleteDesarrollos
    
    	public function updateDesarrollos($id, $nombre, $razon, $calle, $interior, $exterior, $cp, $colonia, $localidad, $municipio, $estado, $pais, $rfc, $telefono, $idTrib, $paginaWeb, $correo, $giro){
            $sql = "UPDATE $this->table SET NOMBRE = ?, RAZON_SOCIAL = ?, CALLE = ?, NUM_EXTERIOR = ?, NUM_INTERIOR = ?, CP = ?, COLONIA = ?, LOCALIDAD = ?, MUNICIPIO = ?, ESTADO = ?, PAIS = ?, RFC = ?, TELEFONO = ?, REG_ID_TRIB = ?, PAGINA_WEB = ?, EMAIL = ? WHERE CODIGO_DESARROLLO = ?";
            $this->db->query($sql, $nombre, $razon, $calle, $interior, $exterior, $cp, $colonia, $localidad, $municipio, $estado, $pais, $rfc, $telefono, $idTrib, $paginaWeb, $correo, $id);
            $result = $this->db->getAll($this->table);
            return $result;
    	}//updateUsuarios
        
        public function retriveDesarrollos($id){
            $sql = "SELECT * FROM $this->table WHERE CODIGO_DESARROLLO = ?";
            $result = $this->db->queryAllById($sql, $id);
            return $result;
        }//retriveDesarrollos
        
        public function getSelectedColumns(){
            $sql = "SELECT CODIGO_DESARROLLO, NOMBRE FROM $this->table";
            $result = $this->db->queryAllById($sql);
            return $result;
        }//getSelectedColumns
    }//class DesarrollosModel
?>