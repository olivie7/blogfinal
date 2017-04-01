<?php $this->layout('layout', ['title' => '']);?>

<?php $this->start('main_content')?>


<div class="jumbotron">
			<?php if (empty($success1)): ?>

			<form method="post" id='myDIV' class="formhorizontal">
				<legend>Récupération du mot de passe</legend>

				<?php
if (isset($errorText)) {
    echo '<p class="text-danger">' . $errorText . '</p>';
}
?>

				<div class="form-group">
					<label for="email">Entrez votre adresse email</label>
					<input type="mail" class="form-control" name="email" id="email" placeholder="email@mail.mail" required>
				</div>

				<div class="text-center">
				<input type="submit" class="btn btn-primary">
				</div>
			</form>

			<?php else:
    echo '<p class="text-info text-center">' . $success1 . '</p>';
endif;
?>
		</div>
		


	<?php $this->stop('main_content')?>