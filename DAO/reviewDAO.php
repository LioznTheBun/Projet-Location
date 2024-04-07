<?php
class reviewDAO{
	public static function getReviewsByIdOffre($offre_id){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			SELECT * 
			FROM Review
			WHERE offre_id=? 
			SQL);
		$state->execute(array($offre_id));
		if($state->rowCount() > 0){
			$i=0;
			$listReview=array();
			while($data = $state->fetch()){
				$listReview[] = new Review();
				$listReview[$i]->setId($data['id']);
				$listReview[$i]->setUser_id($data['user_id']);
				$listReview[$i]->setOffre_id($data['offre_id']);
				$listReview[$i]->setNotation($data['notation']);
				$listReview[$i]->setCommentaire($data['commentaire']);
				$listReview[$i]->setDate_notation($data['date_notation']);
				$i++;
			}
			$state->CloseCursor();
			return $listReview;
		}
	}

	public static function getReviewsByIdAuteur($user_id){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			SELECT * 
			FROM Review
			WHERE user_id=? 
			SQL);
		$state->execute(array($user_id));
		if($state->rowCount() > 0){
			$i=0;
			$listReview=array();
			while($data = $state->fetch()){
				$listReview[] = new Review();
				$listReview[$i]->setId($data['id']);
				$listReview[$i]->setUser_id($data['user_id']);
				$listReview[$i]->setOffre_id($data['offre_id']);
				$listReview[$i]->setNotation($data['notation']);
				$listReview[$i]->setCommentaire($data['commentaire']);
				$listReview[$i]->setDate_notation($data['date_notation']);
				$i++;
			}
			$state->CloseCursor();
			return $listReview;
		}
	}

	public static function createReview($review){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			INSERT INTO Review(user_id, offre_id, notation, commentaire, date_notation)
			VALUES(?,?,?,?,?);
			SQL);
		$state->execute(array($review->getUser_id(),$review->getOffre_id(),$review->getNotation(), $review->getCommentaire(), $review->getDate_notation()));
		$state->CloseCursor();
	}
}
