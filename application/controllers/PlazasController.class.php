<?php
	class PlazasController extends BaseController{
	    public function AgregarAction(){
	        include CURR_VIEW_PATH . "agregarplaza.phtml";
	    }
	    
	    public function ListaAction(){
	        $plazasModel = new PlazasModel("plazas");
	        $plazas = $plazasModel->getPlazas();
	        include  CURR_VIEW_PATH . "mostrarplazas.phtml";
	        
	    }
	    
	    public function indexAction(){
    	    $plazasModel = new PlazasModel("plazas");
    	    $plazas = $plazasModel->getPlazas();
	        // Load View template
        	include  CURR_VIEW_PATH . "mostrarplazas.phtml";
    	}//indexAction
    
    	public function insertAction($nombre, $descripcion, $ciudad , $estado){
    		$plazasModel = new PlazasModel("plazas");
    		$plazas = $plazasModel->insertPlaza($nombre, $descripcion, $ciudad , $estado);
    		// Load View template
    		include  CURR_VIEW_PATH . "mostrarplazas.phtml";
    	}//insertAction
    
    	public function deleteAction($id){
    		$plazasModel = new PlazasModel("plazas");
    		$plazas = $plazasModel->deletePlaza($id);
    		// Load View template
    		include  CURR_VIEW_PATH . "mostrarplazas.phtml";
    	}//deleteAction
    
    	public function updateAction($id, $nombre, $descripcion , $ciudad, $estado){
    		$plazasModel = new PlazasModel("plazas");
    		$plazasModel->updatePlaza($id, $nombre, $descripcion , $ciudad, $estado);
    		$plazas = $plazasModel->getPlazas();
    		// Load View template
    		include  CURR_VIEW_PATH . "mostrarplazas.phtml";
    	}//updateAction
    	
    	
    	public function llenarFormaEditarAction($id){
    	    $plazasModel = new PlazasModel("plazas");
    	    $plaza = $plazasModel->getPlazabyID($id);
    	    include  CURR_VIEW_PATH . "editarplaza.phtml";
    	    
    	}
    	
    	public function consultaAction($id){
    	    $plazasModel = new PlazasModel("plazas");
    	    $plaza = $plazasModel->getPlazabyID($id);
    	    include  CURR_VIEW_PATH . "consultaplaza.phtml";
    	    
    	}
	}//classSistemasController
?>