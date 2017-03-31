<?php
namespace Model;

class ResetPasswordModel extends \W\Model\Model
{
/**
 * Récupère une ligne de la table en fonction d'un identifiant
 * @param  integer Identifiant
 * @return mixed Les données sous forme de tableau associatif
 */

    public function findtoken()
    {
        
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE psw_token = :token';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':token', $_GET["token"]);
        $sth->execute();

        return $sth->fetch();
    }

}
