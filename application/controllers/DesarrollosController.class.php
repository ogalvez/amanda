<?php
    class DesarrollosController extends BaseController{
    	public function indexAction(){
            $desarrollosModel = new DesarrollosModel("desarrollos");
            $result = $desarrollosModel->getDesarrollos();
	    // Load View template
            include  CURR_VIEW_PATH . "desarrollos.phtml";
    	}//indexAction
    
    	public function insertAction($nombre, $razon, $calle, $interior, $exterior, $cp, $colonia, $localidad, $municipio, $estado, $pais, $rfc, $telefono, $idTrib, $paginaWeb, $correo, $giro){
            $desarrollosModel = new DesarrollosModel("desarrollos");
            $result = $desarrollosModel->insertDesarrollos($nombre, $razon, $calle, $interior, $exterior, $cp, $colonia, $localidad, $municipio, $estado, $pais, $rfc, $telefono, $idTrib, $paginaWeb, $correo, $giro);
            // Load View template
            include  CURR_VIEW_PATH . "desarrollos.phtml";
    	}//insertAction
        
        public function updateAction($id, $nombre, $razon, $calle, $interior, $exterior, $cp, $colonia, $localidad, $municipio, $estado, $pais, $rfc, $telefono, $idTrib, $paginaWeb, $correo, $giro){
            $desarrollosModel = new DesarrollosModel("desarrollos");
            $result = $desarrollosModel->updateDesarrollos($id, $nombre, $razon, $calle, $interior, $exterior, $cp, $colonia, $localidad, $municipio, $estado, $pais, $rfc, $telefono, $idTrib, $paginaWeb, $correo, $giro);
            // Load View template
            include  CURR_VIEW_PATH . "desarrollos.phtml";
    	}//updateAction
    
    	public function deleteAction($id){
            $desarrollosModel = new DesarrollosModel("desarrollos");
            $result = $desarrollosModel->deleteDesarrollos($id);
            // Load View template
            include  CURR_VIEW_PATH . "desarrollos.phtml";
    	}//deleteAction
    
    	public function retriveAction($id){
            $desarrollosModel = new DesarrollosModel("desarrollos");
            $result = $desarrollosModel->retriveDesarrollos($id);
            echo json_encode($result);
    	}//retriveAction
        
        public function exportAction(){
            $desarrollosModel = new DesarrollosModel("desarrollos");
            $result = $desarrollosModel->getSelectedColumns();
            $genpdf = new GeneratePDF($result, array("CÓDIGO", "NOMBRE"), "desarrollos");
            $result = $genpdf->Execute();
        }//exportAction
    }//class DesarrollosController
?>