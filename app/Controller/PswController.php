<?php
namespace Controller;

use \Model\ResetPasswordModel;
use \Model\UsersModel;
use \W\Controller\Controller;
use \W\Security\StringUtils;

class PswController extends Controller
{
    public function returnPsw()
    {
        $error   = [];
        $success1 = [];
        $post    = [];

        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $post[$key] = trim(strip_tags($value));
            }
            if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
                $error = 'Erreur mail non valide';

            } else {

                $info = new UsersModel();
                if ($info->emailExists($post['email'])) {
                    $infoUser = $info->findIdUser($post['email']);

                    $nbretour = count($infoUser);

                    if ($nbretour === 5) {

                        $token      = new StringUtils();
                        $tokenfinal = $token->randomString($length = 80);

                        $datas = [
                            // colonne sql => valeur à insérer
                            'psw_usr_id' => $infoUser['id'],
                            'psw_token'  => $tokenfinal,
                        ];
                        $User = new ResetPasswordModel();
                        $User->insert($datas);

                        $envmail = new EmailController();
                        $email   = $envmail->sendmail($tokenfinal);
                        $success1 = 'Un lien de réinitialisation vous a été envoyé, verifiez votre boîte mail !<br> Vous pouvez fermer cette page !<br> <a href="http://localhost/blogfinal/public/VeuillezVousConnecter">Cliquez Ici pour vous connecter</a>';
                    }//else {
                        //$errorsText = implode('<br>', $error); 
                   // } 
                } //else {
                    //echo 'email existe pas';
                //} 
            }
        }
        $params = [
            "success1" => $success1,
            "error"   => $error,
        ];
        $this->show('password/psw_recover', $params);
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function newpsw()
    {
        $displayForm = true;
        $error       = [];

        if (isset($_GET['token']) && !empty($_GET['token'])) {

            $token      = new ResetPasswordModel();
            $tokenfinal = $token->findtoken();

            if (!empty($_POST)) {
                $post = array_map('trim', array_map('strip_tags', $_POST));

                if (strlen($post['password']) < 5) {
                    $error = 'Le mot de passe doit fait minimum 8 charactères';
                }

                if (count($error) === 0) {
                    $id   = $tokenfinal['psw_usr_id'];
                    $data = [
                        "password" => password_hash($post['password'], PASSWORD_DEFAULT),
                    ];

                    $newMdp = new UsersModel();
                    if ($newMdp->update($data, $id, $stripTags = true)) {
                        $this->redirectToRoute("login");
                    }

                } else {
                    echo 'il ya des erreurs';
                }

            }

        }
        $datas = [
            "displayForm" => $displayForm,
            "error"       => $error,
        ];
        $this->show('password/psw_recover_update', $datas);
    }

}
