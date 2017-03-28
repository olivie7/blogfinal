<?php 
namespace Model;

class CommentsModel extends \W\Model\Model 
{
/**
	 * Récupère toutes les lignes de la table
	 * @param $orderBy La colonne en fonction de laquelle trier
	 * @param $orderDir La direction du tri, ASC ou DESC
	 * @param $limit Le nombre maximum de résultat à récupérer
	 * @param $offset La position à partir de laquelle récupérer les résultats
	 * @return array Les données sous forme de tableau multidimensionnel
	 */
	public function findAll($idarticle ,$orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
	{

		$sql = 'SELECT * FROM ' . $this->table . ' WHERE id_article = :id_article';
		if (!empty($orderBy)){

			//sécurisation des paramètres, pour éviter les injections SQL
			if(!preg_match('#^[a-zA-Z0-9_$]+$#', $orderBy)){
				die('Error: invalid orderBy param');
			}
			$orderDir = strtoupper($orderDir);
			if($orderDir != 'ASC' && $orderDir != 'DESC'){
				die('Error: invalid orderDir param');
			}
			if ($limit && !is_int($limit)){
				die('Error: invalid limit param');
			}
			if ($offset && !is_int($offset)){
				die('Error: invalid offset param');
			}

			$sql .= ' ORDER BY '.$orderBy.' '.$orderDir;
		}
        if($limit){
            $sql .= ' LIMIT '.$limit;
            if($offset){
                $sql .= ' OFFSET '.$offset;
            }
        }
    $idarticle = (int) $_GET['id'];
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id_article', $idarticle, PDO::PARAM_INT);

		$sth->execute();

		return $sth->fetchAll();
	}
}