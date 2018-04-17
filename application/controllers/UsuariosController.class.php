<?php
	class UsuariosController extends BaseController{
    	public function indexAction(){
        	$usuariosModel = new UsuariosModel("usuarios");
        	$usuarios = $usuariosModel->getUsuarios();
	        // Load View template
        	include  CURR_VIEW_PATH . "usuarios.phtml";
    	}//indexAction
    
    	public function insertAction($usuario, $pass, $sistemas){
    		$usuariosModel = new UsuariosModel("usuarios");
    		$usuarios = $usuariosModel->insertUsuarios($usuario, $pass, $sistemas);
    		// Load View template
    		include  CURR_VIEW_PATH . "usuarios.phtml";
    	}//insertAction
    
    	public function deleteAction($idx){
    		$usuariosModel = new UsuariosModel("usuarios");
    		$usuarios = $usuariosModel->deleteUsuarios($idx);
    		// Load View template
    		include  CURR_VIEW_PATH . "usuarios.phtml";
    	}//deleteAction
    
    	public function updateAction($idx, $usuario, $pass, $status, $sistemas){
    		$usuariosModel = new UsuariosModel("usuarios");
    		$usuarios = $usuariosModel->updateUsuarios($idx, $usuario, $pass, $status, $sistemas);
    		// Load View template
    		include  CURR_VIEW_PATH . "usuarios.phtml";
    	}//updateAction
	}//classUsuariosController
?>