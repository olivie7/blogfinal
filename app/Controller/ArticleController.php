<?php   
namespace Controller;

use \W\Controller\Controller;
use \Model\ArticlesModel;

class ArticleController extends Controller
{

	
	public function ListArticles($orderBy = 'id', $orderDir = 'ASC')
	{

	$listarticle = new ArticlesModel();
	$arti = $listarticle->findAll();
	$params = [
			'article' => $arti
		];
		
		$this->show('article/listArticles', $params);
	
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function ViewArticle($id)
	{
		
				$view   = new ArticlesModel();
				$art    = $view->find($id);
				$params = [
						'added_article' => $art,
				];
				//affiche un template
				$this->show('article/viewArticle', $params);
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 public function AjaxArticles() 
 {
			//traiter le formulaire contact ici...
$maxSize = (1024 * 1000) * 2; // Taille maximum du fichier
$uploadDir = 'uploads/'; // Répertoire d'upload
$mimeTypeAvailable = ['image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'];

$errors = [];
$post = [];
$success = false;

// si le post n'est pas vide, on récupère les données "nettoyées"
if(!empty($_POST)){
	foreach($_POST as $key => $value){
		$post[$key] = trim(strip_tags($value));
	}
	// si la valeur titre a moins de 5 ou plus de 50 caractères, alors "erreur"
	if(strlen($post['title']) < 5 || strlen($post['title']) > 50){
		$errors[] = 'Le titre doit contenir de 5 à 50 caractères';
	}
	// si la valeur recette a moins de 20 caractères, alors "erreur"
	if(strlen($post['content']) < 20){
		$errors[] = 'L\' article doit contenir au moins 20 caractères';
	}
	
///////////////////////////////////////////////////////////////////
	// si le fichier image est défini et ne comporte pas d'erreur
	if(isset($_FILES['picture']) && $_FILES['picture']['error'] === 0){

		$finfo = new \ finfo();
		$mimeType = $finfo->file($_FILES['picture']['tmp_name'], FILEINFO_MIME_TYPE);

		// vérifications de contrôle de l'image
		$extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

		if(in_array($mimeType, $mimeTypeAvailable)){
			// si le fichier n'excède pas le poids maxi autorisé
			if($_FILES['picture']['size'] <= $maxSize){

				if(!is_dir($uploadDir)){
					mkdir($uploadDir, 0755); //pour la compatibilité
				} 
				// on renomme le fichier
				$newPictureName = uniqid('image_').'.'.$extension;

				if(!move_uploaded_file($_FILES['picture']['tmp_name'], $uploadDir.$newPictureName)){
					$errors[] = 'Erreur lors de l\'upload du fichier';
				} 
			}
			else {
				$errors[] = 'La taille du fichier excède 2 Mo';
			}
		}
		else {
			$errors[] = 'Le fichier n\'est pas une image valide';
		}
	}
	else {
		$errors[] = 'Aucune image sélectionnée';
	}

	if(count($errors) === 0){
		$datas = [
					// colonne sql => valeur à insérer
		'title'		=> $post['title'],
		'content'	=> $post['content'],
		'picture' => $newPictureName
		];

		$article = new ArticlesModel();
		if($article->insert($datas)) {
			$success = true;
		}

	}
	
}
	$params = [
		'hello'	  => 'bonjour prénom',
		'success' => $success,
		'errors'  => $errors,
		
	];

$this->show('article/ajaxArticles', $params);

	}



}
		



