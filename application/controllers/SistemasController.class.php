<?php
	class SistemasController extends BaseController{
    	public function indexAction(){
        	$sistemasModel = new SistemasModel("sistemas");
        	$sistemas = $sistemasModel->getSistemas();
	        // Load View template
        	include  CURR_VIEW_PATH . "sistemas.phtml";
    	}//indexAction
    
    	public function insertAction($sistema, $codigo){
    		$sistemasModel = new SistemasModel("sistemas");
    		$sistemas = $sistemasModel->insertSistemas($sistema, $codigo);
    		// Load View template
    		include  CURR_VIEW_PATH . "sistemas.phtml";
    	}//insertAction
    
    	public function deleteAction($idx){
    		$sistemasModel = new SistemasModel("sistemas");
    		$sistemas = $sistemasModel->deleteSistemas($idx);
    		// Load View template
    		include  CURR_VIEW_PATH . "sistemas.phtml";
    	}//deleteAction
    
    	public function updateAction($idx, $sistema, $codigo){
    		$sistemasModel = new SistemasModel("sistemas");
    		$sistemas = $sistemasModel->updateSistemas($idx, $sistema, $codigo);
    		// Load View template
    		include  CURR_VIEW_PATH . "sistemas.phtml";
    	}//updateAction
	}//classSistemasController
?>