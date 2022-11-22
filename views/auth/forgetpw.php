<section class="login-register">
	<div class="login">
		<div class=" background-image">
		</div>
		<div class="form">
			<div class="form-color"></div>
			<form action="/biotouch/updatepw" method="POST">
				<div>
					<input type="email" name="email" id="email" class="email" placeholder="votre email">
				</div>
				<div>
					<input type="password" name="password" id="password" class="password" placeholder="Mot de passe">
				</div>
				<div>
					<input type="password" name="confirm_pass1" id="confirm_pass1" class="password" placeholder="confirmer le Mot de passe">
				</div>


				<input type="submit" name="submit" class="btn_1 full-width" value="Valider">
			</form>
			<div class="error">
				<?php if (isset($error)) : ?>

					<p><?= $error ?> </p>

				<?php endif ?>
			</div>
		</div>
	</div>
</section>