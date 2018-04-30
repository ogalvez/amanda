<?php
	class EmpresasController extends BaseController{
	    public function AgregarAction(){
	        include CURR_VIEW_PATH . "altaempresa.phtml";
	    }
	    
	    public function ListaAction(){
	        $model = new EmpresasModel("empresas");
	        $empresas = $model->getEmpresas();
	        include  CURR_VIEW_PATH . "empresas.phtml";
	        
	    }
	    
	    public function indexAction(){
    	    $empresasModel = new EmpresasModel("empresas");
    	    $empresas = $empresasModel->getEmpresas();
	        // Load View template
        	include  CURR_VIEW_PATH . "empresas.phtml";
    	}//indexAction
    
    	public function insertAction($clave, $tipo, $descripcion, $plaza){
    		$model  = new EmpresasModel("empresas");
    		$empresas = $model->insertEmpresa($clave, $tipo, $descripcion, $plaza);
    		// Load View template
    		include  CURR_VIEW_PATH . "empresas.phtml";
    	}//insertAction
    
    	public function deleteAction($id){
    	    $model = new EmpresasModel("empresas");
    	    $empresas = $model->deleteEmpresa($id);
    		// Load View template
    		include  CURR_VIEW_PATH . "empresas.phtml";
    	}//deleteAction
    
    	public function updateAction($id, $clave, $tipo , $descripcion, $plaza){
    	    $model  = new EmpresasModel("empresas");
    	    $model->updateEmpresa($id, $clave, $tipo , $descripcion, $plaza);
    	    $empresas = $model->getEmpresas();
    		// Load View template
    		include  CURR_VIEW_PATH . "empresas.phtml";
    	}//updateAction
    	
    	
    	public function llenarFormaEditarAction($id){
    	    $model = new EmpresasModel("empresas");
    	    $empresa = $model->getEmpresabyID($id);
    	    include  CURR_VIEW_PATH . "editarempresa.phtml";
    	    
    	}
    	
    	public function consultaAction($id){
    	    $model = new EmpresasModel("empresas");
    	    $empresa = $model->getEmpresabyID($id);
    	    include  CURR_VIEW_PATH . "consultaempresa.phtml";
    	    
    	}
	}//classSistemasController
?>