<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="/pages/<?=$page?>/assets/style.css" media="all" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<title>Document</title>
</head>
<body>
<?php
	session_name("session");
	session_start();
	include("tools/DatabaseLinker.php");
	include("tools/SuperController.php");
	include("DAO/agrementDAO.php");
	include("DTO/agrementDTO.php");
	include("DAO/banDAO.php");
	include("DTO/banDTO.php");
	include("DAO/conversationDAO.php");
	include("DTO/coversationDTO.php");
	include("DAO/localisationDAO.php");
	include("DTO/localisationDTO.php");
	include("DAO/offre_agrementDAO.php");
	include("DTO/offre_agrementDTO.php");
	include("DAO/offreDAO.php");
	include("DTO/offreDTO.php");
	include("DAO/photoDAO.php");
	include("DTO/photoDTO.php");
	include("DAO/rankDAO.php");
	include("DTO/rankDTO.php");
	include("DAO/reservationDAO.php");
	include("DTO/reservationDTO.php");
	include("DAO/reviewDAO.php");
	include("DTO/reviewDTO.php");
	include("DAO/userDAO.php");
	include("DTO/userDTO.php");
	include("DAO/messageDAO.php");
	include("DTO/messageDTO.php");

?>

<nav class="navbar sticky-top navbar-expand-md navbar-light bg-light">
	<div class="container-fluid">
	<a class="navbar-brand" href="#">
	<?php 
	if(isset($_SESSION['id'])){
		$user = UserDAO::getUsersById($_SESSION['id']);
		echo '<img class="icon" src="pages/connexion/assets/images/'.$user->getPicture().'" width="100" height="70" alt="">Nom Original</a>';
	}
	else{
		echo '<img class="icon" src="#" width="100" height="70" alt="">Nom Original</a>';
	}
	?>
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse " id="navbarTogglerDemo01">
		<ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
			<li class="nav-item">
			<a class="nav-link" href="index.php">Accueil</a>
			</li>
			<li>
			<a class="nav-link" onclick="window.open('./documentation/doc.pdf', '_blank');">Documentation</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="index.php?page=creation">Créer une offre</a>
			</li>
			<?php
			if(isset($_SESSION['id'])):?>
			<li class="nav-item">
			<a class="nav-link" href="index.php?page=Messagerie">Messagerie</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="index.php?page=profil">Profil</a>
			</li>
			<?php
				if($_SESSION['role'] == 1){
					echo '<li class="nav-item">
					<a class="nav-link" href="index.php?page=admin">Page administrateur</a>
					</li>';
				}
			?>
			<li class="nav-item">
			<a class="nav-link" href="index.php?page=deconnexion">Se deconnecter</a>
			</li>
			<?php else:?>
			<li class="nav-item">
			<a class="nav-link" href="index.php?page=connexion">Se connecter</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="index.php?page=inscription">S'inscrire</a>
			</li>
			<?php endif;?>
		</ul>
	</div>
	</div>
</nav>

<?php

	$page = "accueil";

	if(!empty($_GET['page'])) {
		$page = $_GET['page'];
	}

	SuperController::callPage($page);

?>

</body>
</html>