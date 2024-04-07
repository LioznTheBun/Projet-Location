<?php
class ControllerDeconnexion{
	function includeView(){
		include('deconnexion.php');
	}

	function __construct(){
		$this->includeView();
	}
}