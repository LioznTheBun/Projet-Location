<?php
class offre_agrementDAO{
	public static function getOffreAgrementByIdAgrements($agrements_id){
        $dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			SELECT * 
			FROM offre_agrements 
			WHERE agrements_id = ?
			SQL);
		$state->execute(array($agrements_id));
		$data = $state->fetch();
        if($state->rowCount() > 0){
            $offre_agrement = new Offre_Agrement();
            $offre_agrement->setOffre_id($data['offre_id']);
            $offre_agrement->setAgrement_id($data['arguments_id']);
        }
        return $offre_agrement;
    }

    public static function getListeOffreAgrementById_offre($offre_id){
        $dtb = DatabaseLinker::getConnexion();
        $listeAgrements = [];
        $state = $dtb->prepare(<<<SQL
			SELECT * 
			FROM offre_agrements 
			WHERE offre_id = ? ;
			SQL);
		$state->execute(array($offre_id));
        $resultats = $state->fetchAll();
        foreach ($resultats as $agrements) {
            $listeAgrements[] = offre_agrementDAO::getOffreAgrementByIdAgrements($agrements["agrements_id"]);
        }
        return $listeAgrements;
    }

    public static function CreateLinkAgrementOffre($offre_id, $agrements_id){
        $dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
            INSERT INTO offre_agrements(offre_id, agrements_id) 
            VALUES(?,?);
            SQL);
		$state->execute(array($offre_id, $agrements_id,));
    }
}