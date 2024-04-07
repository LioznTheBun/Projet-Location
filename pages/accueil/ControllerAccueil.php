<?php
class ControllerAccueil{

	function includeView($listOffre){
		include('accueil.php');
	}

	function __construct() {
		$listOffre = offreDAO::getOffre();
		
		$this->includeView($listOffre);  
	}

	function getLocalisation($id){
		return offreDAO::getLocalisation($id);
	}

	function getPhoto($idoffre){
		return photoDAO::getPhotoById_offre($idoffre);
	}
}