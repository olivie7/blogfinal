<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<!-- Pour etre sur que ie utilise la derniere version du moteur de rendu -->
	<meta http-equiv="X-UA-Compatible" content="IE-Edge">

	<!-- Bootstrap CSS 3 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<!-- Bootstrap font-awesome  -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- Latest compiled and minified CSS For Bootstrap select -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	
	<!-- Google font Kaushan Script-->
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">

	<!-- HTML5 Shiv-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" integrity="sha256-3Jy/GbSLrg0o9y5Z5n1uw0qxZECH7C6OQpVBgNFYa0g=" crossorigin="anonymous"></script>
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>

<nav class="navbar navbar-toggleable-md navbar-inverse text-center">
	<ul class="nav navbar-nav text-center">
	
		<li>
		<li><a href="<?= $this->url('article_addArticles') ?>">Ajouter article</a></li>
		<li><a href="<?= $this->url('article_listArticles') ?>">Liste d'Articles</a></li>
		<!--<li><a href="list_recipes.php">Liste de recette</a></li>-->
	</ul>
</nav>

<main class="page">
	<div class="container">
		<header>
			<h1><?= $this->e($title) ?></h1>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
	</main>
</body>
</html>