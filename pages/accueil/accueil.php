<article class="container">
	<header></header>
	<section class="row">
	<?php 
	$i=0;
	foreach ($listOffre as $offre) : ?>
		<div class="col-6 row">
			<section class=" mt-3">
				<div id="carouselIndicators<?=$i?>" class="carousel slide" data-bs-ride="false" data-bs-interval="false">
					<div class="carousel-indicators">
						<button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
						<button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
						<button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
						<button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
					</div>
					<div class="carousel-inner">
						<?php $photo = ControllerAccueil::getPhoto($offre->getId());
						?>
				</div>
			</section>
			<p class="col-6 text-center"><?= $offre->getTitre() ?></p>
			<p class="col-6 text-center"><?= $offre->getPrix() ?> €</p>
			<img src='<?php echo $photo->getLien(); ?>'>
			<p class="col-6 text-center"><?= $offre->getDate_début() ?> jusqu'au <?= $offre->getDate_fin() ?></p>
			<?php
				$localisation = ControllerAccueil::getLocalisation($offre->getId());
				echo 'Dans la ville de ' .$localisation->getVille();
				echo ' au ' . $localisation->getAdresse();
			?>
			<a href="index.php?page=view&avis=<?= $offre->getId() ?>">Aller à cette offre</a>

		</div>
	<?php
	$i++; 
	endforeach; ?>
	</section>
</article>