<?php
class ControllerInscription{
	function __construct() {
		if(!empty($_POST['nom']) && !empty($_POST['prenom']) && 
		!empty($_POST['email'])&& !empty($_FILES['photo'])&&
		!empty($_POST['pseudo']) && !empty($_POST['password'])){
			$user = new User();
			$user->setUsername($_POST['pseudo']);
			$user->setPicture($_FILES['photo']['name']);
			$user->setNom($_POST['nom']);
			$user->setPrenom($_POST['prenom']);
			$user->setEmail($_POST['email']);
			$user->setId_role(3);
			$user->setPassword($_POST['password']);
			UserDAO::createUser($user);
			$dossierDestination = 'pages/connexion/assets/images/';
			$nomFichier = $_FILES['photo']['name'];
			$cheminFichier = $dossierDestination . $nomFichier;
			move_uploaded_file($_FILES['photo']['tmp_name'], $cheminFichier);
			ControllerInscription::redirectUser();
		}

		$this->includeView();
	}
	function includeView(){
		include('inscription.php');
	}
	function redirectUser(){
		header('Location: index.php?page=connexion');
	}

}