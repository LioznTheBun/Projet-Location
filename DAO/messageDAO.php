<?php
class messageDAO{
    public static function getMessageById($id){
        $dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare("
			SELECT * 
			FROM message 
			WHERE idMessage = ?
			");
		$state->execute(array($id));
		$data = $state->fetch();
		$state->CloseCursor();
		if($state->rowCount() > 0){
            $message = new Message();
            $message-> setIdMessage($data['idMessage']);
            $message-> setContent($data['content']);
            $message-> setIdCoversation($data['idConversation']);
            $message-> setIdUser($data['idUser']);
			$message->setHeure($data['heure']);
        }
		if(!empty($message)){
			return $message;
		}
		else{
			return null;
		}
    }
    public static function adMessage($messageDTO){
        $dtb = DatabaseLinker::getConnexion();
		$state = $dtb->prepare("
			INSERT INTO message(content, idConversation, idUser, heure)
			VALUES(?,?,?,NOW());");
		$state->execute(array($messageDTO->getContent(), $messageDTO->getIdCoversation(),$messageDTO->getIdUser()));
    }

	
}