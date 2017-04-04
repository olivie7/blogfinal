<?php $this->layout('layout',['title' => 'Veuillez vous Inscrire']); ?>

<?php $this->start('main_content') ?>

<h2></h2>
<!-- <div class="well"> -->
<form method="post" class="form-horizontal btn-block">

	<div class="form-group">
		<label class="col-md-4 control-label" for="firstname">Prénom</label>
		<div class="col-md-4">
		<input class="form-control" type="text" id="firstname" name="username" placeholder="Votre prénom.." required>
	</div>
	</div>


	<div class="form-group">
		<label class="col-md-4 control-label" for="lastname">Nom</label>
		<div class="col-md-4">
		<input class="form-control" type="text" id="lastname" name="lastname" placeholder="Votre nom de famille.." required>
	</div>
	</div>

	<div class="form-group">
		<label class="col-md-4 control-label" for="email">Email</label>
		<div class="col-md-4">
		<input class="form-control" type="email" id="email" name="email" placeholder="votre@email.fr">
	</div>
	</div>

	<div class="form-group">
		<label class="col-md-4 control-label" for="password">Mot de passe</label>
		<div class="col-md-4">
		<input class="form-control" type="password" id="password" name="password" placeholder="Un mot de passe super compliqué" required>
	</div>
	</div>

	<div class="text-center">
		<input type="submit" value="Envoyer" class="btn btn-default">
	</div>
</div>
</form>



<?php $this->stop('main_content') ?>
