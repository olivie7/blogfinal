<?php $this->layout('layout',['title' => 'Veuillez vous connecter']); ?>

<?php $this->start('main_content') ?>

	<h2></h2>

	<form method="POST" class="form-horizontal">
				<div class="form-group">
					<label for="ident">Identifiant</label>
					<input class="form-control" type="email" id="ident" name="ident" placeholder="votre@email.fr">
				</div>
				

				<div class="form-group">
					<label for="passwd">Mot de passe</label>
					<input class="form-control" type="password" id="passwd" name="passwd" placeholder="Votre mot de passe">
				</div>
				

				<div class="form-group text-center">
					
					<input type="submit" value="Se connecter" class="btn btn-default">
				
					<a href="psw_recorver.php" class="btn btn-info">Mot de passe oublié</a>
				
				</div>
				
			</form>
<?php $this->stop('main_content') ?>
