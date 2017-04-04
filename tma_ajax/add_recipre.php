<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une recette</title>


	<link rel="stylesheet" type="text/css" href="assets/css/styleAdmin.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

</head>
<body>



	<main class="container">

		<div class="jumbotron">
			<h3>Ajouter une recette</h3>
			
			<div id="result"></div>
			
			<form method="post" id='addUser' action="#" enctype="multipart/form-data">
				<div class="form-group">
					<label for="title">Nom de la recette</label>
					<input class="form-control" type="text" name="title" id="title">
				</div>

				<div class="form-group">
					<label for="content">Recette</label>
					<textarea class="form-control" rows="6" name="content" id="content"></textarea>
				</div>

				<div class="form-group">
					<label for="picture">Photo</label>
					<input class="form control" type="file" name="picture" id="picture" accept="image/*">
				</div>

				<div class="text-center">
					<input class="btn btn-primary" type="submit" id="submitForm" value="Envoyer la recette">
				</div>
			</form>
			
		</div>

		<script src="js/jquery-3.2.0.min.js"></script>
		<script src="js/script.js"></script>
	</body>
	</html>