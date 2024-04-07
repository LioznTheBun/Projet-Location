<?php
class UserDAO{
	public static function getUsers(){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			SELECT id
			FROM Users
			SQL);
		$state->execute();
		$data = $state->fetchAll();
		$listUser = [];
		foreach ($data as $user) {
			$listUser[] = UserDAO::getUsersById($user["id"]);
		}
			return $listUser;
		}
	

	public static function getUserByPseudoAndPassword($username, $password){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			SELECT * 
			FROM users 
			WHERE username = ? 
			AND password = SHA2(?, 256)
			SQL);
		$state->execute(array($username, $password));
		$data = $state->fetch();
		$state->CloseCursor();
		if($state->rowCount() > 0){
			$user = new User();
			$user->setId($data['id']);
			$user->setUsername($data['username']);
			$user->setPicture($data['picture']);
			$user->setNom($data['nom']);
			$user->setPrenom($data['prenom']);
			$user->setEmail($data['email']);
			$user->setId_role($data['id_role']);
			return $user;
		}
		return NULL;
	}

	public static function getUserByPseudo($username){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			SELECT * 
			FROM users 
			WHERE username = ? 
			SQL);
		$state->execute(array($username));
		$data = $state->fetch();
		$state->CloseCursor();
		if($state->rowCount() > 0){
			$user = new User();
			$user->setId($data['id']);
			$user->setUsername($data['username']);
			$user->setPicture($data['picture']);
			$user->setNom($data['nom']);
			$user->setPrenom($data['prenom']);
			$user->setEmail($data['email']);
			$user->setId_role($data['id_role']);
			return $user;
		}
		return NULL;
	}

	public static function getUsersName(){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare("SELECT username FROM users ");
		$state->execute();
        $resultats = $state->fetchAll();
        foreach ($resultats as $user) {
            $usersName[] = $user["username"];
        }
		return $usersName;
	}

	public static function getUsersById($id){
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
			$user = new User();
			$user->setId($data['id']);
			$user->setUsername($data['username']);
			$user->setPicture($data['picture']);
			$user->setNom($data['nom']);
			$user->setPrenom($data['prenom']);
			$user->setEmail($data['email']);
			$user->setId_role($data['id_role']);
			return $user;
		}
		return NULL;
	}

	public static function createUser($user){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			INSERT INTO Users(username, nom, prenom, password, email, picture, id_role)
			VALUES(?,?,?,SHA2(?, 256),?,?,?);
			SQL);
		$state->execute(array($user->getUsername(),$user->getNom(),$user->getPrenom(),$user->getPassword(),$user->getEmail(), $user->getPicture(), $user->getId_role()));
		$state->CloseCursor();
	}

	public static function updateUsername($username){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			UPDATE users
			SET username = ? where id = ?
			SQL);
		$state->execute(array($username, $_SESSION['id']));
		$state->CloseCursor();
	}

	public static function updatePassword($password){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			UPDATE users
			SET password = SHA2(?, 256) where id = ?
			SQL);
		$state->execute(array($password, $_SESSION['id']));
		$state->CloseCursor();
	}

	public static function updateEmail($email){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			UPDATE users
			SET email = ? where id = ?
			SQL);
		$state->execute(array($email, $_SESSION['id']));
		$state->CloseCursor();
	}

	public static function updatePicture($picture){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			UPDATE users
			SET picture = ? where id = ?
			SQL);
		$state->execute(array($picture, $_SESSION['id']));
		$state->CloseCursor();
	}

	public static function updateRole($id_role, $idUser){
		$dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare(<<<SQL
			UPDATE users
			SET id_role = ? where id = ?
			SQL);
		$state->execute(array($id_role, $idUser));
		$state->CloseCursor();
	}

}