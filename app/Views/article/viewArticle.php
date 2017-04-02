<?php
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Listposts'])

?>


<?php $this->start('main_content');?>
<div id="content" class="container">



	<legend class="nameForm"><h2>Détails de l' article</h2>
	</legend>

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


		<form action="<?=$this->url('comment_addcomment');?>" id="add" method="post" accept-charset="utf-8">
			
			<input type="hidden" name="id" value="<?=$added_article['id'];?>">
			<div class="row">
				<!--Pseudo-->
				<div class="form-group col-xs-12">
					<div class="col-md-6 inputGroupContainer">
						<label class="control-label">Pseudo :</label>
						<div  style="margin-bottom: 20px" class="input-group">
							<input type="text" name="pseudo" id="pseudo" /><br />
						</div>
					</div>
				</div>
			</div>

			<!-- on affiche une message en cas d'erreur en rouge, sinon un message de succès en vert -->
			<?php if(isset($errorsText)): ?>
				<p style="color:red;"><?php echo $errorsText; ?></p>
			<?php endif; ?>

			<?php if($success === true): ?>
				<p style="color:green;"><?php echo $successComment; ?></p>
			<?php endif; ?>


			<!-- Text area -->
			<div class="form-group col-xs-12">
				<div class="col-md-6 inputGroupContainer">
					<label class="control-label">Commentaire</label>
					<div  style="margin-bottom: 20px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<textarea id="message" class="form-control"  rows="5" name="comment" placeholder="Votre message"></textarea>
					</div>
				</div>
			</div>

			<!-- Button -->
			<div class="form-group col-xs-12">
				<div style="margin-bottom: 20px" class="col-md-12 inputGroupContainer">
					<button type="submit" id="submitForm" class="btn btn-warning" >Envoyer <span class="glyphicon glyphicon-send"></span></button>
				</div>
			</div>

		</form>

		<div class="row col-xs-12"">
			<div id="messages">
				<!-- les commentaires-->
				<?php if (!empty($commentos)): ?>
					<?php foreach ($commentos as $commentaires): ?>
						<p class="list"><?php echo $commentaires['pseudo']; ?></p>
						<p class="list"><?php echo nl2br($commentaires['content']); ?></p>
						<legend class="nameForm"></legend>
					<?php endforeach;?>
				</div>
			<?php else: ?>
				Aucun commentaire trouvé !
			<?php endif;?>
		</div>
</div>
	



<?php else: ?>
	Aucune recette trouvée !
<?php endif;?>

<script src="../../assets/Js/modal.js"></script>
<?php $this->stop('main_content')?>

<script src="Js/scriptJS.js"></script>
<script>
	$(function() {
		addform();
		
	});

</script>
