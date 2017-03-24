<?php
namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{

    public function loginUser()
    {
        //traiter le formulaire contact ici...
        $err     = array();
        $display = true;

        if (!empty($_POST)) {

            foreach ($_POST as $key => $value) {
                $post[$key] = trim(strip_tags($value));
            }

            if (!filter_var($post['ident'], FILTER_VALIDATE_EMAIL)) {
                $err[] = 'Veuillez saisir votre identifiant';
            }

            if (empty($post['passwd'])) {
                $err[] = 'Veuillez saisir votre mot de passe';
            }

            if (count($err) > 0) {
                $formError = true;
            } else {
               public function isValidLoginInfo($usernameOrEmail, $plainPassword)

            }
        }

        $this->show('users/loginUser');
    }

}
