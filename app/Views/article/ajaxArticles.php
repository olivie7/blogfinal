<?php $this->layout('layout', ['title' => 'Ajouter un Article']);?>

<?php $this->start('main_content')?>

	<h2>Ajouter un Article</h2>

	<?php if ($success == true): // La variable $success est envoyé via le controller?>
				<p style="color:green">Bravo, votre article a été envoyé</p>
			<?php endif;?>

	<?php if (!empty($errors)): // La variable $errors est envoyé via le controller?>
				<p style="color:red"><?=implode('<br>', $errors);?></p>
			<?php endif;?>

			<div id="result"></div>

				<form method="post" id="add"  enctype="multipart/form-data">
					<div class="form-group">
						<label for="title">Titre de l'Article</label>
						<input class="form-control" type="text" name="title" id="title">
					</div>

					<div class="form-group">
						<label for="content">Article</label>
						<textarea class="form-control" rows="6" name="content" id="content"></textarea>
					</div>

					<div class="form-group">
						<label for="picture">Photo</label>
						<input class="form control" type="file" name="picture" id="picture" accept="image/*">
					</div>

					<div class="text-center">
						<input class="btn btn-primary" type="submit" id="submitForm" value="Envoyer l'Article">
					</div>
				</form>
				
				<script src="../assets/Js/scriptJS.js"></script>

<?php $this->stop('main_content')?>



