<?php
    class IMSSModel extends Model{
    	public function getAsociados(){
            $result = $this->db->getAll($this->table);
            return $result;
    	}//getAsociados
    
    	public function insertIMSS($id_asociado, $params){
            /*$sql = "SELECT CODIGO_ASOCIADO FROM $this->table ORDER BY CODIGO_ASOCIADO DESC";
            $result = $this->db->getOne($sql);
            $sql = "INSERT INTO $this->table VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->db->query($sql, $result + 1, $params['nombre'], $params['apellidoP'], $params['apellidoM'], $params['nacimiento'], $params['edad'], $params['sexo'], $params['hijos'], $params['rfc'], $params['curp'], $params['lugarNacimiento'], $params['nacionalidad'], $params['estadoCivil'], $params['extranjero'], $params['correo'], $params['telefono'], $params['domicilio'], $params['colonia'], $params['delegacion'], $params['ciudad'], $params['estado'], $params['entreCalle1'], $params['entreCalle2'], $params['cp'], $params['domicilioFiscal'], $params['cpFiscal'], $params['fechaInicio'], $params['fechaBaja'], $params['desarrollo'], $params['puesto']);*/
            //$sql = "INSERT INTO IMSS VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            //$this->db->query($sql, $params['numeroIMSS'], $params['FAIMSS'], $params['FBIMSS'], $params['sueldoIMSS'], $params['clinicaIMSS'], $params['tipoIMSS'], $params['comentarioIMSS'], $result + 1);
            //$result = $this->db->getAll($this->table);
            //return $result;
            $sql = "INSERT INTO $this->table VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            $this->db->query($sql, $params['numeroIMSS'], $params['FAIMSS'], $params['FBIMSS'], $params['sueldoIMSS'], $params['clinicaIMSS'], $params['tipoIMSS'], $params['comentarioIMSS'], $id_asociado);
    	}//insertIMSS
    
    	public function deleteAsociados($id){
            $sql = "DELETE FROM $this->table WHERE CODIGO_ASOCIADO = ?";
            $this->db->query($sql, $id);
            $result = $this->db->getAll($this->table);
            return $result;
    	}//deleteGiros
    
    	public function updateIMSS($params){
            $sql = "UPDATE $this->table SET NUMERO = ?, FECHA_ALTA = ?, FECHA_BAJA = ?, SUELDO_IMSS = ?, CLINICA = ?, TIPO = ?, COMENTARIO = ? WHERE CODIGO_ASOCIADO = ?";
            $this->db->query($sql, $params['numeroIMSS'], $params['FAIMSS'], $params['FBIMSS'], $params['sueldoIMSS'], $params['clinicaIMSS'], $params['tipoIMSS'], $params['comentarioIMSS'], $params['id']);
            //$result = $this->db->getAll($this->table);
            //return $result;
    	}//updateUsuarios
        
        public function retriveIMSS($id){
            //$sql = "SELECT NUMERO, FECHA_ALTA, FECHA_BAJA, SUELDO_IMSS, CLINICA, TIPO, COMENTARIO FROM $this->table WHERE CODIGO_ASOCIADO = ?";
            $sql = "SELECT * FROM $this->table WHERE CODIGO_ASOCIADO = ?";
            $result = $this->db->queryAllById($sql, $id);
            return $result;
        }//retriveIMSS
        
        public function getSelectedColumns(){
            $sql = "SELECT CODIGO_ASOCIADO, NOMBRE FROM $this->table";
            $result = $this->db->queryAllById($sql);
            return $result;
        }//getSelectedColumns
    }//class IMSSModel
?>