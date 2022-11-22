<section class="main">
	<form action="">
		<input type="hidden" name="id" id="id" value="<?= $params['article']->id ?>">
	</form>
	<section id="product_detail">
		<article class="product_detail">
			<div>
				<h3 id="title"><?= $params['article']->title ?></h3>
				<p>
					<?php foreach ($params['article']->getTages() as $tag) : ?>
						<span> <?= $tag->category ?></span>
					<?php endforeach ?>
				</p>
				<p>Ref:<?= $params['article']->reference ?></p>
			</div>
			<div>
				<?php if (isset($_SESSION['auth'])) : ?>
					<a class="malist" href="/biotouch/question/<?= $params['article']->id ?>"><span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span><span class="client">Voir Les Avis Clients</span></a>
				<?php elseif ((!isset($_SESSION['auth']))) : ?>
					<a class="malist" href="/biotouch/login"><span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span><span class="client">Voir Les Avis Clients</span></a>
				<?php endif ?>


			</div>
		</article>
		<article class="product_detail">
			<div><img name="file" id="imageId" src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . $params['article']->image ?>" alt="produit"></div>
			<div>
				<form class="quantity">
					<?php if ((isset($_SESSION['auth']))) : ?>
						<select name="product" id="quantity">
							<?php for ($i = 1; $i < 10; $i++) : ?>
								<option value="<?= $i ?>"><?= $i ?></option>
							<?php endfor; ?>
						</select>
					<?php endif ?>

					<p><strong><span id="prix"><?= $params['article']->price ?></span>DT</strong></p>
					<?php if ((isset($_SESSION['auth']))) : ?>
						<a href="#" class="ajouter" id="add">AJOUTER AU PANIER</a>
					<?php elseif ((!isset($_SESSION['auth']))) : ?>
						<a href="/biotouch/login" class="ajouter">AJOUTER AU PANIER</a>
					<?php endif ?>
					<?php if (isset($_SESSION['auth'])) : ?>
						<a class="malist" href="/biotouch/create_question/<?= $params['article']->id ?>"><i class="fas fa-heart"></i>Poser des questions</a>
					<?php elseif ((!isset($_SESSION['auth']))) : ?>
						<a class="malist" href="/biotouch/login"><i class="fas fa-heart"></i>Poser des questions</a>
					<?php endif ?>

				</form>

			</div>
		</article>
		<article>
			<p><?= $params['article']->content ?></p>
			<p><strong>Profitez d'une remise de 5% sur la pochette de 500g(prix déja remisé).</strong></p>
			<p><strong>Profitez d'une remise de 10% sur la lot de 2 pochettes de 500g(prix déja remisé).</strong></p>
		</article>

	</section>
</section>