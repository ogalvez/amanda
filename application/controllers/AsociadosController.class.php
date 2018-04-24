<?php
    class AsociadosController extends BaseController{
    	public function indexAction(){
            $model = new AsociadosModel("ASOCIADOS");
            $result = $model->getAsociados();
	    // Load View template
            include  CURR_VIEW_PATH . "asociados.phtml";
    	}//indexAction
    
    	public function insertAction($params){
            $modelAsociados = new AsociadosModel("ASOCIADOS");
            $result = $modelAsociados->insertAsociados($params);
            $modelIMSS = new IMSSModel("IMSS");
            $modelIMSS->insertIMSS($result, $params);
            $modelSeguros = new SegurosModel("SEGUROS");
            $modelSeguros->insertSeguros($result, $params);
            $result = $modelAsociados->getAsociados();
            // Load View template
            include  CURR_VIEW_PATH . "asociados.phtml";
    	}//insertAction
        
        public function updateAction($params){
            $modelAsociados = new AsociadosModel("ASOCIADOS");
            $modelAsociados->updateAsociados($params);
            $modelIMSS = new IMSSModel("IMSS");
            $modelIMSS->updateIMSS($params);
            $modelSeguros = new SegurosModel("SEGUROS");
            $modelSeguros->updateSeguros($params);
            $result = $modelAsociados->getAsociados();
            // Load View template
            include  CURR_VIEW_PATH . "asociados.phtml";
    	}//updateAction
    
    	public function deleteAction($id){
            $model = new AsociadosModel("ASOCIADOS");
            $result = $model->deleteAsociados($id);
            // Load View template
            include  CURR_VIEW_PATH . "asociados.phtml";
    	}//deleteAction
    
    	public function retriveAction($id){
            $modelAsociados = new AsociadosModel("ASOCIADOS");
            $asociados = $modelAsociados->retriveAsociados($id);
            $modelIMSS = new IMSSModel("IMSS");
            $imss = $modelIMSS->retriveIMSS($id);
            $modelSeguros = new SegurosModel("SEGUROS");
            $seguros = $modelSeguros->retriveSeguros($id);
            $result = array_merge($asociados, $imss, $seguros);
            echo json_encode($result);
    	}//retriveAction
        
        public function exportAction(){
            $model = new AsociadosModel("ASOCIADOS");
            $result = $model->getSelectedColumns();
            $genpdf = new GeneratePDF($result, array("CÓDIGO", "NOMBRE"), "asociados");
            $result = $genpdf->Execute();
        }//exportAction
    }//class AsociadosController
?>