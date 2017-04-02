<?php
namespace Controller;

use \Model\UsersModel;
use \W\Controller\Controller;
use \W\Security\AuthentificationModel;
use \W\Security\AuthorizationModel;

class UserController extends Controller
{

    public function authUser1()
    {
        $error   = array();
        $post    = array();
        $success = false;

        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $post[$key] = trim(strip_tags($value));
            }

            if (strlen($post['username']) < 3) {
                $error[] = 'Le prénom doit faire au moins 3 caractères';
            }

            if (strlen($post['lastname']) < 3) {
                $error[] = 'Le nom doit faire au moins 3 caractères';
            }

            if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
                $error[] = 'L\'adresse email est invalide';
            }

            if (strlen($post['password']) < 3 || strlen($post['password']) > 20) {
                $error[] = 'Le mot de passe doit comporter entre 8 et 20 caractères maximum';
            } else {
                $passwordHash = password_hash($post["password"], PASSWORD_DEFAULT);
            }

            if (count($error) > 0) {
                $formError = true;
            } else {

                $datas = [
                    // colonne sql => valeur à insérer
                'username' => ucfirst($post['username']),
                'lastname' => ucfirst($post['lastname']),
                'email'    => $post['email'],
                'password' => $passwordHash,
                ];
                $User = new UsersModel();
                $User->insert($datas);
                $this->flash('Bonjour vous etes bien inscrit', 'info');
            }
        }
        $params = [
        'success' => $success,
        'error'   => $error,
        ];

        $this->show('users/authUser', $params);
    }


////////////////////////////////////////////////////////////////////////////////
    public function loginUser()
    {

        if(!empty($w_user))
        {
           $redirect = new AuthorizationModel();
           die($redirect->redirectToLogin());
       }
        //traiter le formulaire contact ici...
       $err     = [];
       $success = false;
       $post    = [];

       if (!empty($_POST)) {

        foreach ($_POST as $key => $value) {
            $post[$key] = trim(strip_tags($value));
        }

        if (!filter_var($post['ident'], FILTER_VALIDATE_EMAIL)) {
            $err[] = 'Veuillez saisir votre identifiant';
        }

        if (empty($post['passwd']) || strlen($post['passwd']) < 3) {

            $err[] = 'Veuillez saisir votre mot de passe';
        }

        if (count($err) > 0) {
            echo implode('<br>', $err);
        } else {
            $User = new AuthentificationModel();
            $id   = $User->isValidLoginInfo($post['ident'], $post['passwd']);
            if ($id) {
                $ident   = new UsersModel();
                $tmpUser = $ident->find($id);
                $User->logUserIn($tmpUser);
                $success = true;
                $this->flash('Vous etes bien connecté','info');

                    //$this->redirectToRoute('article_ajaxArticles');
            } else {
                $err[] = "Vous n'etes pas identifié";
            }
        }
    }
    $params = [
    'success' => $success,
    'err'     => $err,
            //"w_user" => $w_user,
    ];
    $this->show('users/loginUser', $params);
}
}
