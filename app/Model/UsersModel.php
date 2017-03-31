<?php
namespace Model;

use \W\Model\ConnectionModel;

class UsersModel extends \W\Model\Model
{
    public function findIdUser($email)
    {

        if (!isset($email)) {
            return false;
        }

        $sql = 'SELECT * FROM ' . $this->table . ' WHERE email = :email LIMIT 1';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':email', $email);
        $sth->execute();

        return $sth->fetch();
    }

    public function emailExists($email)
    {

        $app = getApp();

        $sql = 'SELECT ' . $app->getConfig('security_email_property') . ' FROM ' . $this->table .
        ' WHERE ' . $app->getConfig('security_email_property') . ' = :email LIMIT 1';

        $dbh = ConnectionModel::getDbh();
        $sth = $dbh->prepare($sql);
        $sth->bindValue(':email', $email);
        if ($sth->execute()) {
            $foundUser = $sth->fetch();
            if ($foundUser) {
                return true;
            }
        }

        return false;
    }

}
