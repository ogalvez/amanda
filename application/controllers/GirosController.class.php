<?php
    class GirosController extends BaseController{
    	public function indexAction(){
            $model = new GirosModel("giros_desarrollo");
            $result = $model->getGiros();
	    // Load View template
            include  CURR_VIEW_PATH . "giros.phtml";
    	}//indexAction
    
    	public function insertAction($nombre){
            $model = new GirosModel("giros_desarrollo");
            $result = $model->insertGiros($nombre);
            // Load View template
            include  CURR_VIEW_PATH . "giros.phtml";
    	}//insertAction
        
        public function updateAction($id, $nombre){
            $model = new GirosModel("giros_desarrollo");
            $result = $model->updateGiros($id, $nombre);
            // Load View template
            include  CURR_VIEW_PATH . "giros.phtml";
    	}//updateAction
    
    	public function deleteAction($id){
            $model = new GirosModel("giros_desarrollo");
            $result = $model->deleteGiros($id);
            // Load View template
            include  CURR_VIEW_PATH . "giros.phtml";
    	}//deleteAction
    
    	public function retriveAction($id){
            $model = new GirosModel("giros_desarrollo");
            $result = $model->retriveGiros($id);
            echo json_encode($result);
    	}//retriveAction
        
        public function exportAction(){
            $model = new GirosModel("giros_desarrollo");
            $result = $model->getSelectedColumns();
            $genpdf = new GeneratePDF($result, array("CÓDIGO", "NOMBRE"), "giros");
            $result = $genpdf->Execute();
        }//exportAction
    }//class GirosController
?>