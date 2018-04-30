<?php
    class SegurosModel extends Model{
    	public function getAsociados(){
            $result = $this->db->getAll($this->table);
            return $result;
    	}//getAsociados
    
    	public function insertSeguros($id_asociado, $params){
            $sql = "SELECT IDSEGURO FROM $this->table ORDER BY IDSEGURO DESC";
            $result = $this->db->getOne($sql);
            $sql = "INSERT INTO $this->table VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->db->query($sql, $result + 1, $params['tipoSeguro'], $params['FISeguro'], $params['FVSeguro'], $params['numeroSeguro'], $params['valorPoliza'], $params['clinicaSeguro'], $params['comentarioSeguro'], $id_asociado);
    	}//insertSeguros
    
    	public function deleteAsociados($id){
            $sql = "DELETE FROM $this->table WHERE CODIGO_ASOCIADO = ?";
            $this->db->query($sql, $id);
            $result = $this->db->getAll($this->table);
            return $result;
    	}//deleteGiros
    
    	public function updateSeguros($params){
            $sql = "UPDATE $this->table SET TIPO = ?, FECHA_INICIO = ?, FECHA_VENCIMIENTO = ?, NUMERO = ?, VALOR_POLIZA = ?, CLINICA = ?, COMENTARIO = ? WHERE IDSEGURO = ?";
            $this->db->query($sql, $params['tipoSeguro'], $params['FISeguro'], $params['FVSeguro'], $params['numeroSeguro'], $params['valorPoliza'], $params['clinicaSeguro'], $params['comentarioSeguro'], $params['idPoliza']);
            //$result = $this->db->getAll($this->table);
            //return $result;
    	}//updateUsuarios
        
        public function retriveSeguros($id){
            //$sql = "SELECT TIPO, FECHA_INICIO, FECHA_VENCIMIENTO, NUMERO, VALOR_POLIZA, CLINICA, COMENTARIO FROM $this->table WHERE CODIGO_ASOCIADO = ?";
            $sql = "SELECT * FROM $this->table WHERE CODIGO_ASOCIADO = ?";
            $result = $this->db->queryAllById($sql, $id);
            return $result;
        }//retriveSeguros
        
        public function getSelectedColumns(){
            $sql = "SELECT CODIGO_ASOCIADO, NOMBRE FROM $this->table";
            $result = $this->db->queryAllById($sql);
            return $result;
        }//getSelectedColumns
    }//class SegurosModel
?>