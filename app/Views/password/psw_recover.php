<?php $this->layout('layout', ['title' => '']);?>

<?php $this->start('main_content')?>

<?php var_dump($_POST); ?>
<div class="jumbotron">
			<?php if(!isset($success)): ?>
			<form method="post" class="formhorizontal">
				<legend>Récupération du mot de passe</legend>

				<?php 	
					if(isset($error))
					{
						echo '<p class="text-danger">'.$error.'</p>';
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

				echo '<p class="text-info text-center">'.$success.'</p>';

				endif;
			?>
		</div>
	</main>
	<?php // require_once '../inc/script.php'; ?>
	<?php $this->stop('main_content')?>