<?php
namespace Controller;


use \W\Controller\Controller;
use \Model\CommentsModel;



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
                          }

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
                $comment1 = new CommentsModel();
                $comment1->insert($datas);
                


            }

        }
        $this->redirectToRoute('article_listArticles');
       
    }


/////////////////////////////////////////////////////////////////////////////
   
}
