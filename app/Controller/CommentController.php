<?php
namespace Controller;

use \Model\CommentsModel;
use \W\Controller\Controller;



class CommentController extends Controller
{
    public function addComment()
    {
        $success = false;
        $error   = [];
        $post    = [];

        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $post[$key] = trim(strip_tags($value));
                var_dump($post);             }

            if (strlen($post['comment']) < 3) {
                $error[] = 'Le commentaire doit faire au moins 3 caractères';
            }
            if (count($error) > 0) {
                $formError = true;
            } else {
                $success = true;

                $datas   = [
                    // colonne sql => valeur à insérer
                    'content'    => $post['comment'],
                    'id_article' => $post['id'],
                    
                ];
                $comment = new CommentsModel();
                $comment->insert($datas);

            }

        }
       
    }
/////////////////////////////////////////////////////////////////////////////
    public function () {
    	$listAll = new CommentsModel();
    	$viewComment = $listAll->findAll($idarticle ,$orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null);
    	$params = [
			'commentaire' => $viewComment,
		];
		
		$this->show('comment/listAllCommentsOfArticle', $params);
    }
}
