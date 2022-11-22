<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>BIOTOUCH</title>
		<link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?>">
		<script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'jquery.js' ?>"></script>

	</head>

	<body>
		<header>
			<i class="bi  bi-chevron-compact-up text-success"></i>

			<ul class=slider_header>
				<li class=" slider_text show">Bénéficiez de 15 % de réduction sur les produits et les gammes et les abonnements de qualité supérieure. Des conditions s'appliquent.</li>
				<li class="slider_text hide">A la recherche d'un cadeau de dernière minute ? Achetez nos cartes-cadeaux numériques !</li>
				<li class="slider_text hide">Jusqu'à 50 % de réduction sur les produits, cheveux et corps les plus vendus !</li>

			</ul>


			<div>

				<img class="logo" src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'logo2.svg' ?> " alt="logo">

				<?php if ((isset($_SESSION['auth']))) : ?>

					<a href="/biotouch/panier"><img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'panier.png' ?> " alt="panier"><strong id="total_basket">
						</strong>
					</a>
				<?php endif ?>

			</div>
			<nav class="menu-nav" id="menu-nav">
				<a href="/biotouch/">ACCEUIL</a>
				<a href="/biotouch/posts">PRODUITS</a>
				<?php if ((isset($_SESSION['auth'])) && ($_SESSION['auth'] === 1)) : ?>
					<a href="/biotouch/admin/posts">ARTICLES</a>
				<?php endif ?>

				<?php if ((!isset($_SESSION['auth'])) && (empty($_SESSION['auth']))) : ?>

					<a class="nav-link" href="/biotouch/login">CONNEXION</a>
					<a class="nav-link" href="/biotouch/register">INSCRIPTION</a>

				<?php else : ?>
					<a class="nav-link" href="/biotouch/logout">SE DECONNECTER</a>
				<?php endif ?>
				<a href="/biotouch/history">NOTRE HISTOIRE</a>
			</nav>
			<div class="mobil-nav">
				<div class="menu-position">
					<div class="menu-header">
						<input type="checkbox" class="chek">
						<div class="menu-chek">
							<div></div>
						</div>
						<div class=" menu">
							<div>
								<div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>


		<main class="container">

			<?= $content ?>
		</main>

		<footer>
			<nav>
				<a href="#"><i class="fas fa-lock"></i>PAIEMENT SECURISÉ</a>
				<a href="#"><i class="fa fa-truck" aria-hidden="true"></i>MALIVRAISON OFFERTE</a>
				<a href="#"><i class="far fa-money-bill-alt"></i>CARTE DE FIDELITE</a>
				<a href="#"><i class="fas fa-phone-alt"></i>SERVICE CLIENT</a>
				<a href="#"><i class="fas fa-check-circle"></i>GARANTIE QUALITE</a>
			</nav>
			<section class="nav_footer">
				<article>
					<h3>BIOTOUCH BY MARWA</h3>


					<ul>
						<li><a href="#">Notre histoire</a></li>
						<li><a href="#">Nos boutiques</a></li>
						<li><a href="#">Le Produit de A à Z</a></li>
						<li><a href="#">Espace clients professionnels</a></li>
						<li><a href="#">Recrutement </a></li>
						<li><a href="#">Contactez-nous!</a></li>
						<li><a href="#">L'Ecole du Produits</a></li>
					</ul>

				</article>
				<article>
					<h3>COMMANDEZ EN LIGNE</h3>

					<ul>
						<li><a href="#">Premetre visite</a></li>
						<li><a href="#">Aide</a></li>
						<li><a href="#">Service client</a></li>
						<li><a href="#">Suivre ma commandez</a></li>
						<li><a href="#">Conditions générales de vente</a> </li>
						<li><a href="#">Information légales</a></li>
						<li><a href="#">L'Ecole du Produits</a></li>
					</ul>

				</article>
				<article>
					<h3>SUIVEZ-NOUS !</h3>

					<ul>
						<li><a href="#">Notre histoire</a></li>
						<li><a href="#">Nos boutiques</a></li>
						<li><a href="#">Le Produits de A à Z</a></li>
						<li><a href="#">Espace clients professionnels</a></li>
					</ul>

				</article>
			</section>
			<section class="developer">
				<p> JBELI BASMA</p>
			</section>
		</footer>
		<script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'menu.js' ?>"></script>
		<script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'slider.js' ?>"></script>
		<script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'layout.js' ?>"></script>
		<script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'panier.js' ?>"></script>
		<script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'showPanier.js' ?>"></script>
		<script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'checkout.js' ?>"></script>

	</body>

</html>