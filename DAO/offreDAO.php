<?php
class offreDAO{
	public static function getOffre(){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			SELECT * 
			FROM offre 
			SQL);
		$state->execute();
		if($state->rowCount() > 0){
			$i=0;
			$listOffre=array();
			while($data = $state->fetch()){
				$listOffre[] = new Offre();
				$listOffre[$i]->setId($data['id']);
				$listOffre[$i]->setTitre($data['titre']);
				$listOffre[$i]->setNbr_personne($data['nbr_personne']);
				$listOffre[$i]->setNbr_pieces($data['nbr_pieces']);
				$listOffre[$i]->setPrix($data['prix']);
				$listOffre[$i]->setDate_heure_parution($data['date_heure_parution']);
				$listOffre[$i]->setDate_début($data['date_début']);
				$listOffre[$i]->setDate_fin($data['date_fin']);
				$listOffre[$i]->setDescriptif($data['descriptif']);
				$listOffre[$i]->setUser_id($data['user_id']);
				$listOffre[$i]->setLocalisation_id($data['localisation_id']);
				$i++;
			}
			$state->CloseCursor();
			return $listOffre;
		}
		return NULL;
	}

	public static function getOffreById($id){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			SELECT * 
			FROM offre 
			WHERE id = ?
			SQL);
		$state->execute(array($id));
		$data = $state->fetch();
		$state->CloseCursor();
		if($state->rowCount() > 0){
			$offre = new Offre();
			$offre->setId($data['id']);
			$offre->setTitre($data['titre']);
			$offre->setNbr_personne($data['nbr_personne']);
			$offre->setNbr_pieces($data['nbr_pieces']);
			$offre->setPrix($data['prix']);
			$offre->setDate_heure_parution($data['date_heure_parution']);
			$offre->setDate_début($data['date_début']);
			$offre->setDate_fin($data['date_fin']);
			$offre->setDescriptif($data['descriptif']);
			$offre->setUser_id($data['user_id']);
			$offre->setLocalisation_id($data['localisation_id']);
			return $offre;
		}
		return NULL;
	}

	public static function makeOffreObjet($id, $titre, $nbr_personne, $nbr_pieces, $prix, $date_début,$date_fin, $descriptif, $user_id, $localisation_id){
		$offre = new Offre();
		$offre->setId($id);
		$offre->setTitre($titre);
		$offre->setNbr_personne($nbr_personne);
		$offre->setNbr_pieces($nbr_pieces);
		$offre->setPrix($prix);
		$offre->setDate_heure_parution(time());
		$offre->setDate_début($date_début);
		$offre->setDate_fin($date_fin);
		$offre->setDescriptif($descriptif);
		$offre->setUser_id($user_id);
		$offre->setLocalisation_id($localisation_id);
		return $offre;
	}

	public static function createOffre($offre){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			INSERT INTO offre (titre, nbr_personne, nbr_pieces, prix, date_début, date_fin, descriptif, user_id, localisation_id)
			VALUES(?,?,?,?,?,?,?,?,?);
			SQL);
		$state->execute(array($offre->getTitre(),$offre->getNbr_personne(),$offre->getNbr_personne(),$offre->getPrix(),$offre->getDate_début(),$offre->getDate_fin(),$offre->getDescriptif(),$offre->getUser_id(),$offre->getLocalisation_id()));
		$newid = $dtb->lastInsertId();
		$state->CloseCursor();
		return $newid;
	}

	public static function removeOffre($id){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			DELETE FROM offre
			WHERE id=?
			SQL);
		$state->execute(array($id));
		$state->CloseCursor();
	}

	public static function getLocalisation($idOffre){
		$dtb = DatabaseLinker::getConnexion();
        $listeMessages = [];
        $state = $dtb->prepare("SELECT * FROM localisation
		inner join offre on offre.localisation_id = localisation.id
		where offre.id =  ?");
		$state->execute(array($idOffre));
        $resultats = $state->fetch();
		$localisation = new Localisation();
		$localisation->setAdresse($resultats['adresse']);
		$localisation->setVille($resultats['ville']);
        return $localisation;

	}
}