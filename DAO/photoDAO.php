<?php
class photoDAO
{
	public static function getPhotoById_offre($offre_id)
	{
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			SELECT * 
			FROM photo 
			WHERE id_offre = ?
			SQL);
		$state->execute(array($offre_id));
		$data = $state->fetch();
		$state->CloseCursor();
		if ($state->rowCount() > 0) {
			$photo = new Photo();
			$photo->setLien($data['lien']);
			$photo->setOffre_id($data['id_offre']);
			return $photo;
		}
		return NULL;
	}

	public static function movePhoto($photo, $offre_id)
	{
		$total = count($_FILES['photo']["name"]);
		for ($i = 0; $i < $total; $i++) {
			$extension_upload = strtolower(substr(strrchr($photo['name'][$i], '.'), 1));
			$name = time();
			$nomPhoto = str_replace(' ', '', $name) . "." . $extension_upload;
			$name = "./assets/img/photoLogement/" . str_replace(' ', '', $name) . "." . $extension_upload;
			move_uploaded_file($photo['tmp_name'][$i], $name);
			$listPhoto[] = new Photo();
			$listPhoto[$i]->setId($i);
			$listPhoto[$i]->setLien($name);
			$listPhoto[$i]->setOffre_id($offre_id);
		}
		return $listPhoto;
	}

	public static function insertPhoto($photos)
	{
		$dtb = DatabaseLinker::getConnexion();
		foreach ($photos as $photo) {
			$state = $dtb->prepare(<<<SQL
			INSERT INTO Photo(lien, id_offre)
			VALUES(?,?);
			SQL);
			$state->execute(array($photo->getLien(), $photo->getOffre_id()));
			$state->CloseCursor();
		}
	}

	public static function removePhoto($id)
	{
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			DELETE FROM Photo
			WHERE id=?
			SQL);
		$state->execute(array($id));
		$state->CloseCursor();
	}
}
