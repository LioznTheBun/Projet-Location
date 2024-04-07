<?php

class banDAO{
	public static function getAgrementById($id){
        $dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare("
			SELECT * 
			FROM agrements 
			WHERE id = ?
			");
		$state->execute(array($id));
		$data = $state->fetch();
        if($state->rowCount() > 0){
            $ban = new Ban();
            $ban->setId($data['id']);
            $ban->setUser_id($data['user_id']);
            $ban->setRaison($data['raison']);
            $ban->setDate_debut($data['date_debut']);
        }
        return $ban;
    }

    public static function banUserById($banDTO){
        $dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare("
			INSERT INTO Ban( user_id, raison, date_debut)
			VALUES(?,?,?);
			");
		$state->execute(array($banDTO->getUser_id(), $banDTO->getRaison(), $banDTO->getDate_debut()));
    }

    public static function unbanUserByIdUser($user_id){
        $dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare("
			DELETE FROM ban where user_id = ?;");
        $state->execute(array($user_id));
    }
}