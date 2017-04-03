<?php
namespace Controller;

use \Model\CommentsModel;
use \W\Controller\Controller;

class CommentController extends Controller
{
    public function addComment()
    {

        $success        = false;
        $error          = [];
        $post           = [];
        $successComment = "Votre commentaire à été bien ajouté";
        $errorsText     = '';

        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $post[$key] = trim(strip_tags($value));
            }
            if (strlen($post['pseudo']) < 3) {
                $error[] = 'Le pseudo doit faire au moins 3 caractères';
            }
            if (strlen($post['comment']) < 10) {
                $error[] = 'Le commentaire doit faire au moins 10 caractères';
            }
            if (count($error) > 0) {

                $errorsText = implode('<br>', $error);

            } else {
                // $getUser = new UsersModel();
                $infoUsr = $this->getUser();
                $datas   = [
                    // colonne sql => valeur à insérer
                    'content'    => $post['comment'],
                    'id_article' => $post['id'],
                    'pseudo'     => $post['pseudo'],
                    'id_user'    => $infoUsr['id'],
                ];
                $comment1 = new CommentsModel();
                $comment1->insert($datas);
                $arti        = $post['id'];
                $viewComment = $comment1->findAllcomment($arti);
                $newView     = json_encode($viewComment);
                $params      = [
                    'newtab' => $niewview,
                ];

                $this->redirectToRoute('article_viewArticle',  ["id" => $post['id']]);
                $success = true;

            }

        }

        // $this->redirectToRoute('article_viewArticle', ["id" => $post['id']]);

    }

/////////////////////////////////////////////////////////////////////////////

}
