<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="pages/messagerie/assets/stylesMessagerie.css" rel="stylesheet">
  <script src="pages/messagerie/assets/script.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Page de messagerie</title>
</head>

<body>
  <div class="container">
    <h1>Mes Conversations</h1>
    <form method="post" action="index.php?page=Messagerie">
    <a href="#" onclick="showConversationInput()">Démarrer une conversation</a>
    <input type="text" id="conversation-input" name="search" placeholder="Rechercher un pseudo" class="marge">
    <button type="submit" id="submit-button">Rechercher</button>
  </form>

  <div id="search-results"></div>
    <ul class="conversation-list">
    <?php
      $liste = ControllerMessagerie::getListerecheche();
        if($liste != NULL){
          foreach ($liste as $result){
              echo '<a href="index.php?page=messagerie&newConv='.$result.'" class="recherche">'.$result.'</a>';
          }

        }
        $listeConversation = ControllerMessagerie::getListeConversation();
        foreach($listeConversation as $conversationDTO){?>
            <li class="conversation-list-item" data-conversation-id="<?php echo $conversationDTO->getIdConversation()?>">
                <div class="sender"><?php 
                if($conversationDTO->getIdUser1() != $_SESSION['id']){
                    echo ControllerMessagerie::getName($conversationDTO->getIdUser1());
                }
                else{
                    echo ControllerMessagerie::getName($conversationDTO->getIdUser2());
                }?>
                </div>
                <?php $liste = ControllerMessagerie::getLastMessage($conversationDTO->getIdConversation()); ?>
                <?php if(isset($liste)){?>
                  <div class="message"><?php echo  $liste[0]?></div>
                  <div class="timestamp"><?php echo  $liste[1]?></div>
                  <?php
                }
                ?>
            </li>

<?php
        }
    ?>
    </ul>
  </div>
</body>
</html>
<?php
/*
      if (isset($_POST['search'])) {

        $searchTerm = $_POST['search'];

        $users = UserDAO::getUsersName();
        $searchResults = array_filter($users, function($user) use ($searchTerm) {
          return stripos($user, $searchTerm) !== false;
        });

        if (count($searchResults) > 0) {
          foreach ($searchResults as $result) {
            echo '<div>' . $result . '</div>';
          }
        } else {
          echo 'Aucun résultat trouvé.';
        }
      }
    ?>*/