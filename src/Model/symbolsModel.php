<?php

namespace  ASCII\Model;

use ASCII\Manager\Manager;

use PDO;

class symbolsModel
{
    public function create(string $symbolsName, string $symbolsValue)
    {
        if (!$symbolsName || !$symbolsValue) {
            return;
        }
        try {
            $sth = Manager::getPdo()->prepare("INSERT INTO `symbols`"
                . "(`symbols_name`, `symbols_value`) "
                . " VALUES (:symbols_name, :symbols_value)"
                );
            $sth->bindValue(":symbols_name", $symbolsName);
            $sth->bindValue(":symbols_value", $symbolsValue);
            $sth->execute();
            $this->success = $symbolsName . "  has been created";
            
        } catch (\Throwable $e) {
            $this->error = $e->getMessage();
        }
    }
    
    public function selectAll ()
    {
        
        try {
            $sth = Manager::getPDO()->prepare("SELECT `symbols_name`, `symbols_value` FROM `symbols`");
            $sth->execute();
            // fetchAll renvoie toutels les lignes de resultats
            // qui corspd à la requête
            // pr choisir son format on peut util un argument
            $this->results = $sth->fetchAll(PDO::FETCH_OBJ);
            
            
        } catch (\Throwable $e) {
            $this->error= $e->getMessage();
        }
    }
    
    public function remove (string $symbolsValue)
    {
        
        if (!$symbolsValue) {
            return;
        }
        try {
            $sth = Manager::getPdo()->prepare("DELETE FROM `symbols` WHERE `symbols_value` = :symbols_value"
                );
            
            $sth->bindValue(":symbols_value", $symbolsValue);
            $sth->execute();
            $this->success = $symbolsValue . "  has been removed";
            
        } catch (\Throwable $e) {
            $this->error = $e->getMessage();
        }
        
        
    }
}

