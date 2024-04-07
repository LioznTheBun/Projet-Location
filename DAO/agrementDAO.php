<?php

class agrementDAO{
	public static function getAgrementById($id){
        $dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare("SQL
			SELECT * 
			FROM agrements 
			WHERE id = ?
			");
		$state->execute(array($id));
		$data = $state->fetch();
        if($state->rowCount() > 0){
            $agrement = new Agrement();
            $agrement->setId($data['id']);
            $agrement->setNom($data['nom']);
        }
        return $agrement;
    }

	public static function getAgrements(){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			SELECT * 
			FROM Agrements 
			SQL);
		$state->execute();
		if($state->rowCount() > 0){
			$i=0;
			$listAgrement=array();
			while($data = $state->fetch()){
				$listAgrement[] = new Agrement();
				$listAgrement[$i]->setId($data['id']);
				$listAgrement[$i]->setNom($data['nom']);
				//$listAgrement[$i]->setIcon($data['icon']);
				$i++;
			}
			$state->CloseCursor();
			return $listAgrement;
		}
		return NULL;
	}
}
