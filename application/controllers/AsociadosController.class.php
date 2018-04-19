<?php
    class AsociadosController extends BaseController{
    	public function indexAction(){
            $model = new AsociadosModel("asociados");
            $result = $model->getAsociados();
	    // Load View template
            include  CURR_VIEW_PATH . "asociados.phtml";
    	}//indexAction
    
    	public function insertAction($params){
            $model = new AsociadosModel("asociados");
            $result = $model->insertAsociados($params);
            // Load View template
            include  CURR_VIEW_PATH . "asociados.phtml";
    	}//insertAction
        
        public function updateAction($id, $nombre){
            $model = new GirosModel("giros_desarrollo");
            $result = $model->updateGiros($id, $nombre);
            // Load View template
            include  CURR_VIEW_PATH . "giros.phtml";
    	}//updateAction
    
    	public function deleteAction($id){
            $model = new AsociadosModel("asociados");
            $result = $model->deleteAsociados($id);
            // Load View template
            include  CURR_VIEW_PATH . "asociados.phtml";
    	}//deleteAction
    
    	public function retriveAction($id){
            $model = new GirosModel("giros_desarrollo");
            $result = $model->retriveGiros($id);
            echo json_encode($result);
    	}//retriveAction
        
        public function exportAction(){
            $model = new AsociadosModel("asociados");
            $result = $model->getSelectedColumns();
            $genpdf = new GeneratePDF($result, array("CÓDIGO", "NOMBRE"), "asociados");
            $result = $genpdf->Execute();
        }//exportAction
    }//class AsociadosController
?>