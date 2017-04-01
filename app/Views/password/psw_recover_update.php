<?php $this->layout('layout', ['title' => 'Veuillez vous connecter']);?>

<?php $this->start('main_content')?>

<!-- contient mon menu -->
		<div class="jumbotron">

			<?php 
				if($displayForm):
			?>
			<form method="post" class="formhorizontal">
				<legend>Récupération du mot de passe</legend>

				<?php 	
					if(isset($errorText))
					{
						echo '<p class="text-danger">'.$errorText.'</p>';
					}
				 ?>

				<div class="form-group">
					<label for="password">Entrez votre nouveau mot de passe</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="*******" required>
				</div>

				<div class="text-center">					
				<input type="submit" class="btn btn-primary">
				</div>
			</form>

				<?php 
					else:
						echo '<p class="text-danger">'.$error.'</p>';
					endif;
				?>
		</div>
	
	<?php $this->stop('main_content')?>