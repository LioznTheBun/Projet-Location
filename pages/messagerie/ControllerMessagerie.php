<?php
class ControllerMessagerie{
    private $listerecheche = [];
    function __construct() {
        if(empty($_SESSION['id'])){
            header("location:index.php");
        }
        if(isset($_POST['search'])){
            $liste = [];
            $searchTerm = $_POST['search'];

            $users = UserDAO::getUsersName();
            $searchResults = array_filter($users, function($user) use ($searchTerm) {
             return stripos($user, $searchTerm) !== false;
            });

                if (count($searchResults) > 0) {
                    foreach ($searchResults as $result) {
                        $liste[] = $result ;
                    }
                }
                else {
                    echo '<script> alert("aucun résultat trouvé");</script>';
                }
                $this->listerecheche = $liste;
      }
      if(isset($_GET['newConv'])){
        conversationDAO::addConversation($_GET['newConv']);
        header("Location: index.php?page=messagerie");
      }
        
        $this->includeView();
    }
    function includeView(){
		include('messagerie.php');
	}

    public static function getListeConversation(){
        $dtb = DatabaseLinker::getConnexion();
        $listeConversation = [];
        $state = $dtb->prepare("SELECT * FROM conversation WHERE idUser1= ? or idUser2 = ?");
        $state->execute(array($_SESSION['id'],$_SESSION['id']));
        $resultats = $state->fetchAll();
        foreach ($resultats as $conversation) {
            $listeConversation[] = conversationDAO::getConversationById($conversation["idConversation"]);
        }
        return $listeConversation;
    }

    public function getName($id){
        $user = UserDAO::getUsersById($id);
        return $user->getUsername();
    }

    public function getLastMessage($idConversation){
        $dtb = DatabaseLinker::getConnexion();
        $state = $dtb->prepare("SELECT idMessage FROM `message` WHERE idConversation = ? ORDER by idMessage DESC LIMIT 1");
        $state->execute(array($idConversation));
        $resultats = $state->fetch();
        if(!empty($resultats)){
            $messageDTO = messageDAO::getMessageById($resultats['idMessage']);
            $liste = [];
            if($messageDTO->getIdUser() == $_SESSION['id']){
                $liste[] = "Vous : " .$messageDTO->getContent();
            }
            else{
                $liste[]= $messageDTO->getContent();
            }
            $liste[] = ControllerMessagerie::diffTime($messageDTO->getHeure());
            return $liste;
        }
        else{
            return null;
        }
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

    public function getListerecheche(){
        return $this->listerecheche;
    }

}