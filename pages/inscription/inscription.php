<link rel="stylesheet" type="text/css" href="pages/inscription/assets/stylesInscription.css">

<form action="index.php?page=Inscription" method="POST" enctype="multipart/form-data">
		<label for="nom">Nom :</label>
		<input type="text" id="nom" name="nom" required>

		<label for="prenom">Prénom :</label>
		<input type="text" id="prenom" name="prenom" required>

		<label for="email">E-mail :</label>
		<input type="email" id="email" name="email" required>

		<label for="pseudo">Pseudo :</label>
		<input type="text" id="pseudo" name="pseudo" required>

		<label for="password">Mot de passe :</label>
		<input type="password" id="password" name="password" required>

		<label for="photo">Photo de profil (format PNG) :</label>
		<input type="file" id="photo" name="photo" accept="image/png" required>

		<input type="submit" value="S'inscrire">
	</form>