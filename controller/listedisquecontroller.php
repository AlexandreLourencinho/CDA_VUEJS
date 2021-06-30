<?php

require $_SERVER['DOCUMENT_ROOT']."/model/bdd.php";
class cruddisque
{

    private $db;

    function __construct($connection)
    {
        $this->db = $connection->getDbRecord();
    }



    public function getrecord()
    {
        $requete = $this->db->query("SELECT * FROM record.disc");

        return $requete->fetchAll(PDO::FETCH_OBJ);
    }


    public function getonerecord($titre)
    {
        $requete = $this->db->prepare('SELECT disc.disc_picture FROM record.disc WHERE disc.disc_title=:titre');
        $requete->bindValue(':titre',$titre,PDO::PARAM_STR);
        $requete->execute();
        return $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
    }



}