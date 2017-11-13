<?php if($errors): ?>
    <div class="alert alert-danger">
        Identifiants incorrect
    </div>
<?php endif; ?>

<div class="container center">

<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form method="POST" role="form">
			<fieldset>
				<h2>Connectez-vous</h2>
				<hr class="colorgraph">
				<div class="form-group">
                    <?= $form->input('username', 'Nom d\'utilisateur', []); ?>
				</div>
				<div class="form-group">
                    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
				</div>
				<span class="button-checkbox">
					<button type="button" class="btn" data-color="info">Se souvenir de moi</button>
                    <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
					<a href="" class="btn btn-link pull-right">Mot de passe oublié?</a>
				</span>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <button class="btn btn-lg btn-success btn-block">Connexion</button>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<a href="" class="btn btn-lg btn-primary btn-block">Créer un Compte</a>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>

</div>