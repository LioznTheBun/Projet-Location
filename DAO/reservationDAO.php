<?php
class reservationDAO{
	public static function getReservationByUserId($user_id){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			SELECT * 
			FROM users 
			WHERE user_id = ?
			SQL);
		$state->execute(array($user_id));
		if($state->rowCount() > 0){
			$i=0;
			$listReservation=array();
			while($data = $state->fetch()){
				$listReservation[] = new Reservations();
				$listReservation[$i]->setId($data['id']);
				$listReservation[$i]->setUser_id($data['user_id']);
				$listReservation[$i]->setOffre_id($data['offre_id']);
				$listReservation[$i]->setCheck_in($data['check_in']);
				$listReservation[$i]->setCheck_out($data['check_out']);
				$listReservation[$i]->setPrix_total($data['prix_total']);
				$listReservation[$i]->setDate_reservation($data['date_reservation']);
				$i++;
			}
			$state->CloseCursor();
			return $listReservation;
		}
	}

	public static function getReservationByOffreId($offre_id){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			SELECT * 
			FROM Reservation 
			WHERE offre_id = ?
			SQL);
		$state->execute(array($offre_id));
		$data=$state->fetch();
		$state->CloseCursor();
		if($state->rowCount() > 0){
				$reservation = new Reservations();
				$reservation->setId($data['id']);
				$reservation->setUser_id($data['user_id']);
				$reservation->setOffre_id($data['offre_id']);
				$reservation->setCheck_in($data['check_in']);
				$reservation->setCheck_out($data['check_out']);
				$reservation->setPrix_total($data['prix_total']);
				$reservation->setDate_reservartion($data['date_reservation']);
				return $reservation;
			}
			return NULL;
		}

	public static function createReservation($reservation){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			INSERT INTO Reservations(user_id, offre_id, check_in, check_out, prix_total, date_reservation)
			VALUES(?,?,?,?,?,?);
			SQL);
		$state->execute(array($reservation->getUser_id(),$reservation->getOffre_id(), $reservation->getCheck_in(),$reservation->getCheck_out(), $reservation->getPrix_total(), $reservation->getDate_reservation()));
		$state->CloseCursor();
	}
}