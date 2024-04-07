<?php
class ControllerProfil{
	function __construct(){
	if(!isset($_SESSION['id'])){
		$this->redirectUser();
	}
	if(!empty($_POST['email'])){
		UserDAO::updateEmail($_POST['email']);
	} 
	if(!empty($_FILES['photo'])){
		UserDAO::updatePicture($_FILES['photo']['name']);
		$dossierDestination = 'pages/connexion/assets/images/';
		$nomFichier = $_FILES['photo']['name'];
		$cheminFichier = $dossierDestination . $nomFichier;
		move_uploaded_file($_FILES['photo']['tmp_name'], $cheminFichier);
	}
	if(!empty($_POST['pseudo'])){
		UserDAO::updateUsername($_POST['pseudo']);
	}  
	if(!empty($_POST['password'])){
		UserDAO::updatePassword($_POST['password']);
	}
	
	$this->includeView();

	}

	function includeView(){
		include('profil.php');
	}

	function redirectUser(){
		header('Location: index.php');
	}
}