<?php

namespace ASCII\Model;

use ASCII\Manager\Manager;

use PDO;

class FontsModel
{
    
    public function create(string $fontsName, int $fontsLineHeight)
    {
        if (!$fontsName || !$fontsLineHeight) {
            return;
        }
        try {
            $sth = Manager::getPdo()->prepare("INSERT INTO `fonts`"
                . "(`fonts_name`, `fonts_line_height`) "
                . " VALUES (:fonts_name, :fonts_line_height)" 
            );
                $sth->bindValue(":fonts_name", $fontsName);
                $sth->bindValue(":fonts_line_height", $fontsLineHeight);
                $sth->execute();
                $this->success = $fontsName . "  has been created";
           
        } catch (\Throwable $e) {
            $this->error = $e->getMessage();
        }
    }
    
    public function selectAll ()
    {
        try {
            $sth = Manager::getPDO()->prepare("SELECT `fonts_name` FROM `fonts`");
            $sth->execute();
            // fetchAll renvoie toutels les lignes de resultats
            // qui corspd à la requête
            // pr choisir son format on peut util un argument
            $this->results = $sth->fetchAll(PDO::FETCH_OBJ);
            
         
        } catch (\Throwable $e) {
            $this->error= $e->getMessage();
        }
        
        
    }
}

    


// try {
    
//     $sth = $dbh->prepare($sql);
//     $sth->bindValue(":fonts_name", "Ma super font");
//     $sth->bindValue(":fonts_line_height", 8);
//     $sth->execute();
//     echo "content";
// } catch (Throwable $e) {
//     echo "pas content: " . $e->getMessage();
// }
