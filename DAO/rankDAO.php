<?php
class rankDAO{
	public static function getRankById($id){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			SELECT * 
			FROM users 
			WHERE id = ?
			SQL);
		$state->execute(array($id));
		$data = $state->fetch();
		$state->CloseCursor();
		if($state->rowCount() > 0){
			$rank = new Rank();
			$rank->setId($id);
			$rank->setLibelle($data["libelle"]);
			return $rank;
		}
		return NULL;
	}
}