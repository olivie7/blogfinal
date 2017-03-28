<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Voici vos Articles']); ?>
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
<h1></h1>
<!-- En-Tête de Présentation -->
<div class="contact col-xs-12">
<h1 class="list">Les Articles</h1>
	<br>
	<table class="table">
		<thead>
			<tr>
				<th class="list">Titre</th>
				<th class="list">Article</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($article as $recipe): ?>
				<tr>
					<td class="list"><?=$recipe['title']; ?></td>
					<td class="list"><?=$recipe['content']; ?></td>
					<td class="list"><img src="../uploads/<?=$recipe['picture']; ?>"></td>
					<td>
						<a href="<?= $this->url('article_viewArticle',["id" => $recipe['id']]) ?>"><button type="button" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span>
							Visualiser cet article</button>
						</a>
					</td>
					<td>
						<a href="admin/modif_recipe.php?id=<?=$recipe['id']; ?>"><button type="button" class="btn btn-info btn-sm">
							<span class="glyphicon glyphicon-edit"></span> Modifier
						</button>
					</a>
				</td>
				<td>
					<a href="admin/delete_recipe.php?id=<?=$recipe['id']; ?>"><button type="button" class="btn btn-info btn-sm">
						<span class="glyphicon glyphicon-remove"></span> Remove
					</button>
				</a>
			</td>
		</tr>
	<?php endforeach; ?>
</tbody>
</table>
</div>

<?php 
//fin du bloc
$this->stop('main_content'); ?>