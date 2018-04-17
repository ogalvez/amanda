<?php

// application/controllers/admin/IndexController.class.php


class IndexController extends BaseController{

    public function mainAction(){

        include CURR_VIEW_PATH . "main.html";

        // Load Captcha class

        

    }

    public function indexAction(){

        /*$userModel = new UserModel("sistemas");

        $users = $userModel->getUsers();

        // Load View template*/

        include  CURR_VIEW_PATH . "index.phtml";

    }
    
    public function insertAction($sistema, $codigo){
    	$userModel = new UserModel("sistemas");
    	
    	$users = $userModel->insertUsers($sistema, $codigo);
    	
    	// Load View template
    	
    	include  CURR_VIEW_PATH . "index.phtml";
    }
    
    public function deleteAction($idx){
    	$userModel = new UserModel("sistemas");
    	
    	$users = $userModel->deleteUsers($idx);
    	
    	// Load View template
    	
    	include  CURR_VIEW_PATH . "index.phtml";
    }
    
    public function updateAction($idx, $sistema, $codigo){
    	$userModel = new UserModel("sistemas");
    	
    	$users = $userModel->updateUsers($idx, $sistema, $codigo);
    	
    	// Load View template
    	
    	include  CURR_VIEW_PATH . "index.phtml";
    }

    public function menuAction(){

        include CURR_VIEW_PATH . "menu.html";

    }

    public function dragAction(){

        include CURR_VIEW_PATH . "drag.html";

    }

    public function topAction(){

        include CURR_VIEW_PATH . "top.html";

    }

}
?>