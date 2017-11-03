<?php

// point de connexion à la base
// les arguments
// 1/ le driver et le host
$dsn = "mysql:host=localhost;dbname=ascii;charset=UTF8";
// 2/ le user
$user = "root";
// 3/ le password
$pswd = "";
// 4/ les options
// $options= "?";

// c'est un objet capable de fournir une connexion
// et de fournir des objets de requete
$dbh = new PDO($dsn, $user, $pswd);

// ajout d'option
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $fontName = "Arial";
// $fontHeight = 6;

$sql = "INSERT INTO `fonts`" . "(`fonts_name`, `fonts_line_height`) " . " VALUES (:fonts_name, :fonts_line_height)";

// c'est un objet capable de faire des requetes

try {
    
    $sth = $dbh->prepare($sql);
    $sth->bindValue(":fonts_name", "Ma super font");
    $sth->bindValue(":fonts_line_height", 8);
    $sth->execute();
    echo "content";
} catch (Throwable $e) {
    echo "pas content: " . $e->getMessage();
}
