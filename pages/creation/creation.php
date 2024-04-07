<script type="text/javascript" src="./pages/creation/assets/javaCreation.js"></script>
<link rel="stylesheet" type="text/css" href="./pages/creation/assets/style.css" media="all" />
<article class="container">
	<header>
		<h1>Création d'une offre :</h1>
	</header>
	<form method="post" enctype="multipart/form-data" action="#">
		<fieldset>
			<legend>Données de l'avis</legend>
			<label for="titre">Titre :</label> <input placeholder="Entrer un titre" name="titre" type="text" id="titre" required /><br />
			<label for="nbr_personne">Nombre de personnes pouvant y loger :</label><input placeholder="Entrer un nbr" type="number" name="nbr_personne" id="nbr_personne" required /><br /> <!-- En faire une selection et non une entrée?-->
			<label for="nbr_pieces">Nombre de pièces :</label> <input placeholder="Entrer le nbr de pièces" name="nbr_pieces" type="number" id="nbr_pieces" required /><br />
			<label for="adresse">Adresse</label><input type="text" id="adresse" name="adresse" autocomplete="address" required enterkeyhint="next"></input>
			<label for="postal-code">ZIP ou Code Postal (falcutatif)</label><input class="postal-code" id="postal-code" name="postal-code" autocomplete="postal-code" enterkeyhint="next">
			<label for="ville">Ville</label><input required type="text" id="ville" name="ville" autocomplete="address-level2" enterkeyhint="next">
			<label for="prix">Prix en € :</label> <input placeholder="Entrer un prix" name="prix" type="number" id="prix" required /><br />
			<label for="date_début">Date de début:</label> <input type="date" id="date_début" name="date_début" value=""><br />
			<label for="date_fin">Date de fin:</label> <input type="date" id="date_fin" name="date_fin" value=""><br />
			<label for="descriptif">Description :</label> <input placeholder="" name="descriptif" type="text" id="descriptif" required /><br />
		</fieldset>
		<fieldset class="row">
			<legend>Les spécificités de votre offre:</legend>
			<?php foreach($listAgrements as $agrement) :
			$name=$agrement->getNom();
			if($i==22) : ?>
				<legend>Sécurités</legend>
			<?php endif; ?>
				<div class="col-md-6 col-lg-4 row checkbox">
				<label class="col-12 text-center" for="<?=$i?>"><?=$name?></label><input class="col-12" type="checkbox" id="<?=$name?>" name="agrement[]" value="<?=$i?>">
				</div>
			<?php $i++;
			endforeach; ?>
		</fieldset>
		<fieldset>
			<label for="photo">Sélectionner le(s) image(s) à envoyer : </label><br><input type="file" accept=".jpg, .jpeg, .png" onchange="handleFiles(files)" id="photo" name="photo[]" required multiple>
			<div><label for="upload"><span id="preview"></span></label></div>
			<!-- Créer un label pour inserer une période pour la date début et fin du logement -->
		</fieldset>
		<p><input type="submit" value="Poster l'offre" /></p>

	</form>

</article>