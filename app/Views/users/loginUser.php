<?php $this->layout('layout', ['title' => 'Veuillez vous connecter']);?>

<?php $this->start('main_content')?>

	<h2></h2>
	<?php if ($success == true): // La variable $success est envoyé via le controller?>
						<p style="color:green"><strong><?php echo $w_flash_message->message; ?></strong></p>
					<?php endif;?>

	<?php if (!empty($err)): // La variable $err est envoyé via le controller?>
						<p style="color:red"><?=implode('<br>', $err);?></p>
					<?php endif;?>

			<div id="result"><?php var_dump($w_user	) ?></div>

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
					<a href="<?php echo $this->url("psw_returnPsw"); ?>" class="btn btn-info">Mot de passe oublié</a>
				</div>
			</form>
<?php $this->stop('main_content')?>
