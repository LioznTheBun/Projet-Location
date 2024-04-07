<link rel="stylesheet" type="text/css" href="pages/profil/assets/stylesProfil.css">

<form action="index.php?page=profil" method="POST" enctype="multipart/form-data">

		<label for="email">E-mail :</label>
		<input type="email" id="email" name="email" >

		<label for="pseudo">Pseudo :</label>
		<input type="text" id="pseudo" name="pseudo" >

		<label for="password">Mot de passe :</label>
		<input type="password" id="password" name="password" >

		<label for="photo">Photo de profil (format PNG) :</label>
		<input type="file" id="photo" name="photo" accept="image/png" >

		<input type="submit" value="Modifier">
	</form>