<?php
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Listposts'])

?>


	<?php $this->start('main_content');?>
			<div id="content" class="container">

				<legend class="nameForm"><h2>Détails de l' article</h2></legend>
				<?php if(!empty($added_article)): ?>
				
				<h2 class="list"><?php echo $added_article['title'];?></h2>

				<p class="list"><?php echo nl2br($added_article['content']); ?></p>
				<!-- on affiche l'image récupérée dans notre tableau added_recipe avec les données récupérées dans la table, à défaut on affiche le nom de la rectte récupérée dans la table -->
				<img src="../../uploads/<?= $added_article['picture'];?>" alt="<?php echo $added_article['title'];?>">


				<!--<p class="list">Publié par <?php echo $added_article['usr_firstname'].' '.$added_article['usr_lastname'];?></p>-->
				<?php else: ?>
				Aucune recette trouvée !
				<?php endif; ?>
			</div>
				<?php $this->stop('main_content')?>
