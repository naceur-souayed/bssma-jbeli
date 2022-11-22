<section class="login-register">
	<div class="login">
		<div class=" background-image">
		</div>
		<div class="form">
			<div class="form-color"></div>
			<form action="/biotouch/login" method="POST">
				<div>
					<input type="email" name="email" id="email" class="email" placeholder="Identifiant">
				</div>
				<div>
					<input type="password" name="password" id="password" class="password" placeholder="Mot de passe">
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox">Se souvenir
					</label>
				</div>
				<div class="forget">
					<a href="/biotouch/forgetpw" id="forget">Mot de passe perdu ? </a>
				</div>

				<input type="submit" class="btn_1 full-width" value="Se connecter">
			</form>

			<p class="new_register">Vous n'avez pas de compte ? <a href="/biotouch/register"> &nbsp &nbsp S'inscrire</a></p>
			<div class="error">
				<?php if (isset($error)) : ?>

					<p><?= $error ?> </p>

				<?php endif ?>
			</div>
		</div>

	</div>
</section>