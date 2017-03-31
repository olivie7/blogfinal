<?php
namespace Controller;

use \W\Controller\Controller;

class RepswController extends Controller
{

    public function newpsw()
    {
        $displayForm = true;

        if (isset($_GET['token']) && !empty($_GET['token'])) {

            $checkToken = $bdd->prepare("SELECT * FROM reset_password WHERE psw_token = :token");
            $checkToken->bindValue(':token', $_GET['token']);

            if ($checkToken->execute()) {

                $infoToken = $checkToken->fetch(PDO::FETCH_ASSOC);

                if (!empty($_POST)) {
                    $post = array_map('trim', array_map('strip_tags', $_POST));

                    if (strlen($post['password']) < 8) {
                        $error = 'Le mot de passe doit fait minimum 8 charactères';
                    }

                    if (!isset($error)) {

                        $change_psw = $bdd->prepare('UPDATE users SET usr_password = :psw WHERE users.usr_id = :id_token');

                        // $change_psw-> bindValue(':psw', $post['password']);
                        $change_psw->bindValue(':psw', password_hash($post['password'], PASSWORD_DEFAULT));
                        $change_psw->bindValue(':id_token', $infoToken['psw_usr_id']);

                        if ($change_psw->execute()) {
                            $del = $bdd->prepare('DELETE FROM reset_password WHERE psw_token = :token');
                            $del->bindValue('token', $_GET['token']);
                            echo 'Votre mot de passe est bien changé';
                            //header('location: loggin.php');

                            if (!$del->execute()) {
                                die(var_dump($del->errorInfo()));
                            }
                        } else {
                            die(var_dump($change_psw->errorInfo()));
                        }
                    }
                }

            } else {
                die(var_dump($checkToken->errorInfo()));
            }

        } else {
            $displayForm = false;
            $error       = 'Erreur, token non reconnu';
        }
        $this->show('password/psw_recover_update');

    }
}
