<?php
class ControllerAdmin{
	
	function __construct() {
		if(!isset($_SESSION["role"])){
			if($_SESSION["role"] != 1){
				$this->redirectUser();
			}
			$this>redirectUser();
		}

		if(isset($_GET['value']) && isset($_GET['id'])){
			UserDAO::updateRole($_GET['value'],$_GET['id']);
			header('Location: index.php?page=admin');
		}
		$this->includeView();  
	}

	function getListeUsers(){
		$listeDTO = UserDAO::getUsers();
		return $listeDTO;
	}

	function redirectUser(){
		header('Location: index.php');
	}

	function includeView(){
		include('admin.php');
	}
}