<?php
class conversationDAO{
    public static function getConversationById($id){
        $dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare("
			SELECT * 
			FROM conversation 
			WHERE idConversation = ?
			");
		$state->execute(array($id));
		$data = $state->fetch();
		$state->CloseCursor();
		if($state->rowCount() > 0){
            $conversation = new Conversation();
            $conversation-> setIdConversation($data['idConversation']);
            $conversation-> setIdUser1($data['idUser1']);
            $conversation-> setIdUser2($data['idUser2']);
        }
        return $conversation;
    }

    

    public static function getListeMessages($idConversation){
        $dtb = DatabaseLinker::getConnexion();
        $listeMessages = [];
        $state = $dtb->prepare("SELECT * FROM message WHERE idConversation = ?");
		$state->execute(array($idConversation));
        $resultats = $state->fetchAll();
        foreach ($resultats as $message) {
            $listeMessages[] = $message["idMessage"];
        }
        return $listeMessages;
    }

    public static function addConversation($idUser2){
        $user2 = UserDAO::getUserByPseudo($idUser2);
        $dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare("
			INSERT INTO conversation(idUser1, idUser2)
			VALUES(?,?);");
		$state->execute(array( $_SESSION['id'],$user2->getId()));
    }
}