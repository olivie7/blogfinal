<?php
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Listposts'])

?>


<?php $this->start('main_content');?>
<div id="content" class="container">



	<legend class="nameForm"><h2>Détails de l' article</h2></legend>
	<?php if (!empty($added_article)): ?>

		<h2 class="list"><?php echo $added_article['title']; ?></h2>

		<p class="list content"><?php echo nl2br($added_article['content']); ?></p>
		<!-- on affiche l'image récupérée dans notre tableau added_recipe avec les données récupérées dans la table, à défaut on affiche le nom d'article récupérée dans la table -->
		<div class="polaroid">
		<img id="myImg" src="../../uploads/<?=$added_article['picture'];?>" alt="<?php echo $added_article['title']; ?>">
		</div>
		<!-- The Modal -->
		<div id="myModal" class="modal">
			<span class="close">×</span>
			<img class="modal-content" id="img01">
			<div id="caption"></div>
		</div>


		<form action="<?=$this->url('comment_addcomment'); ?>" id="add" method="post" accept-charset="utf-8">
			<input type="hidden" name="id" value="<?=$added_article['id']; ?>">
			<!-- Text area -->
			<div class="form-group">
				<div class="col-md-6 inputGroupContainer">
					<label class="control-label">Commentaire</label>
					<div  style="margin-bottom: 20px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<textarea  class="form-control"  rows="5" name="comment" placeholder="Votre message"></textarea>
					</div>
				</div>
			</div>

			<!-- Button -->
			<div class="form-group">
				<div style="margin-bottom: 20px" class="col-md-12 inputGroupContainer">
					<button type="submit" id="submitForm" class="btn btn-warning" >Envoyer <span class="glyphicon glyphicon-send"></span></button>
				</div>
			</div>

		</form>

	<?php else: ?>
		Aucune recette trouvée !
	<?php endif;?>
	<div class="row"></div>
	<?php if (!empty($commentos)): ?>
		<?php foreach($commentos as $commentaires): ?>

			<p class="list"><?php echo nl2br($commentaires['content']); ?></p>
			<legend class="nameForm"></legend>

		<?php endforeach; ?>
	<?php else: ?>
		Aucun commentaire trouvé !
	<?php endif;?>
</div>
<script src="../../assets/Js/modal.js"></script>
<?php $this->stop('main_content')?>

<script src="Js/scriptJS.js"></script>
<script>
	$(function() {
		addform();
	});

</script>
