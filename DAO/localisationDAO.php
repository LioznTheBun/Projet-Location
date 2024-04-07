<?php
class localisationDAO{
	public static function getLocalisation(){		
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			SELECT *
			FROM Localisation
			SQL);
		$state->execute();
		$data = $state->fetchAll();
		$state->CloseCursor();
		if($state->rowCount() > 0){
			$i=0;
			$listLocalisation=array();
			while($data = $state->fetch()){
				$listLocalisation[] = new Localisation();
				$listLocalisation[$i]->setId($data['id']);
				$listLocalisation[$i]->setZip($data['zip']);
				$listLocalisation[$i]->setVille($data['ville']);
				$listLocalisation[$i]->setAdresse($data["adresse"]);
				$i++;
			}
			return $listLocalisation;
		}
		return NULL;
	}

	public static function getLocalisationById($id){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			SELECT * 
			FROM localisation 
			WHERE id = ?
			SQL);
		$state->execute(array($id));
		$data = $state->fetch();
		$state->CloseCursor();
		if($state->rowCount() > 0){
			$localisation = new localisation();
			$localisation->setId($data['id']);
			$localisation->setZip($data['zip']);
			$localisation->setVille($data['ville']);
			$localisation->setAdresse($data["adresse"]);

			return $localisation;
		}
		return NULL;
	}

	public static function makeLocalisationObjet($adresse, $zip, $ville){
		$localisation = new localisation();
		$localisation->setId(1);
		$localisation->setZip($zip);
		$localisation->setVille($ville);
		$localisation->setAdresse($adresse);
		return $localisation;
	}

	public static function createLocalisation($localisation){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			INSERT INTO localisation (adresse, zip, ville)
			VALUES(?,?,?);
			SQL);
		$state->execute(array($localisation->getAdresse(),$localisation->getZip(),$localisation->getVille()));
		$state->CloseCursor();
		$state = $dtb->prepare(<<<SQL
		SELECT id FROM `localisation`  ORDER by id DESC LIMIT 1
		SQL);
		$state->execute(array());
        $resultats = $state->fetch();
		return $resultats['id'];
	}
}