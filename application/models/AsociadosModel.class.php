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
            $this->db->query($sql, $result + 1, $params['nombre'], $params['apellidoP'], $params['apellidoM'], $params['nacimiento'], $params['edad'], $params['sexo'], $params['hijos'], $params['rfc'], $params['curp'], $params['lugarNacimiento'], $params['nacionalidad'], $params['estadoCivil'], $params['extranjero'], $params['correo'], $params['telefono'], $params['domicilio'], $params['colonia'], $params['delegacion'], $params['ciudad'], $params['estado'], $params['entreCalle1'], $params['entreCalle2'], $params['cp'], $params['domicilioFiscal'], $params['cpFiscal'], $params['fechaInicio'], $params['fechaBaja'], $params['desarrollo'], $params['puesto']);
            $result = $this->db->getAll($this->table);
            return $result;
    	}//insertAsociados
    
    	public function deleteAsociados($id){
            $sql = "DELETE FROM $this->table WHERE CODIGO_ASOCIADO = ?";
            $this->db->query($sql, $id);
            $result = $this->db->getAll($this->table);
            return $result;
    	}//deleteGiros
    
    	public function updateAsociados($params){
            $sql = "UPDATE $this->table SET NOMBRE = ?, APELLIDO_P = ?, APELLIDO_M = ?, FECHA_NACIMIENTO = ?, EDAD = ?, SEXO = ?, HIJOS = ?, RFC = ?, CURP = ?, LUGAR_NACIMIENTO = ?, NACIONALIDAD = ?, ESTADO_CIVIL = ?, EXTRAJERO = ?, EMAIL = ?, TELEFONO = ?, DOMICILIO = ?, COLONIA = ?, DELEGACION = ?, CIUDAD = ?, ESTADO = ?, ENTRE_CALLE_1 = ?, ENTRE_CALLE_2 = ?, CP = ?, DOMICILIO_FISCAL = ?, CP_FISCAL = ?, FECHA_INICIO = ?, FECHA_BAJA = ?, CODIGO_DESARROLLO = ?, CODIGO_PUESTO = ? WHERE CODIGO_ASOCIADO = ?";
            $this->db->query($sql, $params['nombre'], $params['apellidoP'], $params['apellidoM'], $params['nacimiento'], $params['edad'], $params['sexo'], $params['hijos'], $params['rfc'], $params['curp'], $params['lugarNacimiento'], $params['nacionalidad'], $params['estadoCivil'], $params['extranjero'], $params['correo'], $params['telefono'], $params['domicilio'], $params['colonia'], $params['delegacion'], $params['ciudad'], $params['estado'], $params['entreCalle1'], $params['entreCalle2'], $params['cp'], $params['domicilioFiscal'], $params['cpFiscal'], $params['fechaInicio'], $params['fechaBaja'], $params['desarrollo'], $params['puesto'], $params['id']);
            $result = $this->db->getAll($this->table);
            return $result;
    	}//updateUsuarios
        
        public function retriveAsociados($id){
            $sql = "SELECT * FROM $this->table WHERE CODIGO_ASOCIADO = ?";
            $result = $this->db->queryAllById($sql, $id);
            return $result;
        }//retriveAsociados
        
        public function getSelectedColumns(){
            $sql = "SELECT CODIGO_ASOCIADO, NOMBRE FROM $this->table";
            $result = $this->db->queryAllById($sql);
            return $result;
        }//getSelectedColumns
    }//class AsociadosModel
?>