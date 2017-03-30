<?php
namespace Controller;

use \Model\ResetPasswordModel;
use \W\Controller\Controller;
use \W\Model\UsersModel;
use \W\Security\StringUtils;

class PswController extends Controller
{
    public function returnPsw()
    {

        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $post[$key] = trim(strip_tags($value));
            }

            if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
                $error = 'Erreur mail non valide';

            } else {

                $info = new UsersModel();
                $info->emailExists($post['email']);
                $nbretour = count($info);

                if ($nbretour == 1) {

                    $token      = new StringUtils();
                    $tokenfinal = $token->randomString($length = 80);

                    $datas = [
                        // colonne sql => valeur à insérer
                        //'psw_usr_id' => $post['email'],
                        'psw_token' => $tokenfinal,
                    ];
                    $User = new ResetPasswordModel();
                    if ($User->insert($datas)) {

                        $envmail = new EmailController();
                        $email = $envmail->sendmail();

                        // le header indispenssable pour des mail avec du html
                        // To send HTML mail, the Content-type header must be set
                        //$headers = 'MIME-Version: 1.0' . "\r\n";
                        //$headers .= 'Content-type: text/html; charset=utf-8' //. "\r\n";

                        //$siteAdd = $_SERVER['SERVER_NAME'];

                        // $data = "<a href='psw_recorver_update?token=.$token.'>Votre lien de récupération</a>";
                        //$data = "<a href='http://localhost/WF3_PERDAF/GitubProject/Projet WF3/Mini_Restaurant/admin/psw_recorver_update.php?token=$tokenfinal>Changez votre mot de passe</a>";

                        // mail($post['email'], 'Réinitialisation du mot de passe', $data, $headers);

                        // $success = 'Un lien de réinitialisation vous a été envoyé, verifiez votre boîte mail !<br> Vous pouvez fermer cette page !';

                    } else {
                        die(var_dump($User->insert($datas)));
                    }
                } else {
                    $error = 'email inconnu ! ';
                }
            } //else {
            //die(var_dump($sql->errorInfo()));
            //}
        }
        $this->show('password/psw_recover');

    }

}
