<?php
    class AsociadosModel extends Model{
    	public function getAsociados(){
            $result = $this->db->getAll($this->table);
            return $result;
    	}//getAsociados
    
    	public function insertAsociados($params){
            $sql = "SELECT CODIGO_ASOCIADO FROM $this->table ORDER BY CODIGO_ASOCIADO DESC";
            $result = $this->db->getOne($sql);
            $sql = "INSERT INTO $this->table VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->db->query($sql, $result + 1, $params['nombre'], $params['apellidoP'], $params['apellidoM'], $params['nacimiento'], $params['edad'], $params['sexo'], 1, $params['rfc'], $params['curp'], $params['lugarNacimiento'], $params['nacionalidad'], $params['estadoCivil'], 1, $params['correo'], $params['telefono'], $params['domicilio'], $params['colonia'], $params['delegacion'], $params['ciudad'], $params['estado'],  $params['entreCalles'], "jajaa", $params['cp'], $params['domicilioFiscal'], $params['cpFiscal'], $params['fechaInicio'], $params['fechaBaja'], $params['desarrollo'], $params['puesto']);
            $result = $this->db->getAll($this->table);
            return $result;
    	}//insertAsociados
    
    	public function deleteAsociados($id){
            $sql = "DELETE FROM $this->table WHERE CODIGO_ASOCIADO = ?";
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
            $sql = "SELECT CODIGO_ASOCIADO, NOMBRE FROM $this->table";
            $result = $this->db->queryAllById($sql);
            return $result;
        }//getSelectedColumns
    }//class AsociadosModel
?>