<?php
class ControllerMessage{
    function __construct() {
        //création de l'utlisateur car pas de page de connexion
        if(empty($_SESSION['id'])){
            header("location:index.php");
        }
        if(!empty($_POST['content'])){
            $this->insertMessage();
        }
        if(isset($_GET['idConversation'])){
            $this->getMessage($_GET['idConversation']);
        }
        else{
            $this->includeView();
        }
    }

    public function includeView(){
        include "message.php";
    }

    public function getMessage($idConversation){
        $_SESSION['idConversation'] = $_GET['idConversation'];
        header("location:index.php?page=Message");
    }

    public function insertMessage(){
        $message = new Message();
        $message-> setContent($_POST['content']);
        $message-> setIdCoversation($_SESSION['idConversation']);
        $message-> setIdUser($_SESSION['id']);
        messageDAO::adMessage($message);
    }

    public function getListeMessage(){
        $listeMessageDTO = [];
        $liste = conversationDAO::getListeMessages($_SESSION['idConversation']);
        foreach($liste as $id){
            $listeMessageDTO[] = messageDAO::getMessageById($id);
        }
        return  $listeMessageDTO;
    }

    public function getName($id){
        $user = UserDAO::getUsersById($id);
        return $user->getUsername();
    }
    public  function diffTime($date){
		$timestampEnregistrement = strtotime($date);
		$timestampActuel = time();
		$diffMinutes = round(($timestampActuel - $timestampEnregistrement) / 60);
	
		if ($diffMinutes < 60) {
			return $diffMinutes . ' minute' . ($diffMinutes > 1 ? 's' : '');
		} elseif ($diffMinutes < 1440) {
			$diffHeures = floor($diffMinutes / 60);
			return $diffHeures . ' heure' . ($diffHeures > 1 ? 's' : '');
		} else {
			$diffJours = floor($diffMinutes / 1440);
			return $diffJours . ' jour' . ($diffJours > 1 ? 's' : '');
		}
	}
}
