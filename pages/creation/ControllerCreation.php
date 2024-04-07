<?php
class ControllerCreation
{
	function includeView($listAgrements)
	{
		$i = 0;
		include('creation.php');
	}

	function __construct()
	{
		if(!isset($_SESSION['id'])){
			echo '<script> alert("Connectez vous pour poster une offre")</script>';
			header('Location: index.php');
		}
		if($_SESSION['role'] == 4){
			header('Location: index.php');
		}
		$listAgrements = agrementDAO::getAgrements();
		$this->includeView($listAgrements);

		if (!empty($_POST)) {

			$titre = htmlspecialchars($_POST["titre"], ENT_QUOTES);
			$nbr_personne = htmlspecialchars($_POST["nbr_personne"], ENT_QUOTES);
			$nbr_pieces = htmlspecialchars($_POST["nbr_pieces"], ENT_QUOTES);
			$adresse = htmlspecialchars($_POST["adresse"], ENT_QUOTES);
			$prix = htmlspecialchars($_POST["prix"], ENT_QUOTES);
			$date_début = htmlspecialchars($_POST["date_début"], ENT_QUOTES);
			$date_fin = htmlspecialchars($_POST["date_fin"], ENT_QUOTES);
			$descriptif = htmlspecialchars($_POST["descriptif"], ENT_QUOTES);
			$adresse= htmlspecialchars($_POST["adresse"], ENT_QUOTES);
			$ville= htmlspecialchars($_POST["ville"], ENT_QUOTES);
			if(isset($_POST["zip"]))
				$zip= htmlspecialchars($_POST["zip"], ENT_QUOTES);
			else
				$zip=NULL;

			$localisation = localisationDAO::makeLocalisationObjet($adresse, $zip, $ville);

			$localisation_id = localisationDAO::createLocalisation($localisation);

			$offre = offreDAO::makeOffreObjet(1, $titre, $nbr_personne, $nbr_pieces, $prix, $date_début, $date_fin, $descriptif, $_SESSION["id"], $localisation_id);

			$offre_id = offreDAO::createOffre($offre);

			$listPhoto = photoDAO::movePhoto($_FILES['photo'], $offre_id);

			photoDAO::insertPhoto($listPhoto);

			if (isset($_POST['agrement'])) {
				$checkboxValues = $_POST['agrement'];
				foreach ($checkboxValues as $value) {
					offre_agrementDAO::CreateLinkAgrementOffre($offre_id,$value);
				}
			}
		}
	}
}
