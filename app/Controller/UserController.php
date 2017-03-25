<?php
namespace Controller;

use \W\Controller\Controller;
use \Model\UsersModel;

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
				$User = new UsersModel();
				$User->isValidLoginInfo($post['ident'], $post['passwd']); 
				$success = true;
			}
		}
		$this->show('users/loginUser');
	}
//////////////////////////////////////////////////////
	
	public function authUser()
	{
		$error = array(); 
		$post = array();

		if(!empty($_POST))
		{
			foreach($_POST as $key => $value)
			{
				$post[$key] = trim(strip_tags($value));
			}

			if(strlen($post['username']) < 3)
			{
				$error[] = 'Le prénom doit faire au moins 3 caractères';
			}

			if(strlen($post['lastname']) < 3)
			{
				$error[] = 'Le nom doit faire au moins 3 caractères';
			}

			if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL))
			{
				$error[] = 'L\'adresse email est invalide';
			}

			if(strlen($post['password']) < 8 || strlen($post['password']) > 20)
			{
				$error[] = 'Le mot de passe doit comporter entre 8 et 20 caractères maximum';
			}  else {
				$passwordHash = password_hash($post["password"], PASSWORD_DEFAULT);
			}

			if(count($error) > 0)
			{		
				$formError = true;
			}
			else {

				$datas = [
					// colonne sql => valeur à insérer
				'username' => $post['username'],
				'lastname' => $post['lastname'],
				'email'		 => $post['email'],
				'password' => $passwordHash
				];
				$User = new UsersModel();
				$User->insert($datas);

			}

		}
		$this->show('users/authUser');
	}

}