<?php
class ControllerConnexion{
	function __construct() {
        // appel de la méthode authenticate si le formulaire de connexion a été envoyé
        if(!empty($_POST['pseudo']) && !empty($_POST['password'])) {
            // si l'utilisateur a été authentifié alors on le redirige vers la prochaine page
            if ($this->authenticate($_POST['pseudo'], $_POST['password']))	{
                $this->redirectUser();
            }
        }
        $this->includeView();  
    }

    public function includeView(){
        include "connexion.php";
    }
    public function authenticate($pseudo, $password){
        $user = UserDAO::getUserByPseudoAndPassword($pseudo, $password);
        if($user != NULL){
            $_SESSION['id'] = $user->getId();
            $role_id = $user->getId_role();
            $_SESSION['role'] = rankDAO::getRankById($role_id);
            return true;
        }
        else{
            return false;
        }
    }
    public function redirectUser(){
        header("location:index.php?page=Accueil");
    }
}