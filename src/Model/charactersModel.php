<?php

namespace  ASCII\Model;

use ASCII\Manager\Manager;

use PDO;

class charactersModel
{
    public function create(string $charactersName, string $charactersValue)
    {
        if (!$charactersName || !$charactersValue) {
            return;
        }
        try {
            $sth = Manager::getPdo()->prepare(
                "INSERT INTO `characters`"
                . "(`characters_name`, `characters_value`) "
                . " VALUES (:characters_name, :characters_value)"
                );
            $sth->bindValue(":characters_name", $charactersName);
            $sth->bindValue(":characters_value", $charactersValue);
            $sth->execute();
            $this->success = $charactersName . "  has been created";
            
        } catch (\Throwable $e) {
            $this->error = $e->getMessage();
        }
    }
    
    public function selectAll ()
    {
        
        try {
            $sth = Manager::getPDO()->prepare("SELECT `characters_name`, `characters_value` FROM `characters`");
            $sth->execute();
            // fetchAll renvoie toutels les lignes de resultats
            // qui corspd à la requête
            // pr choisir son format on peut util un argument
            $this->results = $sth->fetchAll(PDO::FETCH_OBJ);
            
            
        } catch (\Throwable $e) {
           $this->error= $e->getMessage();
        }
    }
    
    public function remove (string $charactersValue)
    {
        
        if (!$charactersValue) {
            return;
        }
        try {
            $sth = Manager::getPdo()->prepare("DELETE FROM `characters` WHERE `characters_value` = :characters_value"
                );
         
            $sth->bindValue(":characters_value", $charactersValue);
            $sth->execute();
            $this->success = $charactersValue . "  has been removed";
            
        } catch (\Throwable $e) {
            $this->error = $e->getMessage();
        }
        
        
    }
}

