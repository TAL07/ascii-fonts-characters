<?php 
// envoyer de la donnée au client
echo "Hello World";
var_dump("Hello World");

$myArray = [
    34 => "foo",
    5 => "bar",
];

var_dump($myArray);

// le float n'est pas fonctionnel
$myArray = [
    0.2 => "foo",
    "string" => "bar",
];

// Itération d'un tableau
// 1/ uniquement la valeur
foreach ($myArray as $value) {
    var_dump($value);
}

// 2/ sur l'index et la valeur
foreach ($myArray as $key => $value) {
    var_dump("key " . $key);
    var_dump("key " . $value);
}

// Objet vide
$obj = new stdClass();
$obj->prop = true;
var_dump($obj);

// Inclure un fichier
// require        -- fatal error
// require_once   -- fatal error
// include        -- warning
// include_once   -- warning
// file_get_contents -- warning


// Response
// - Status: int
// - reason: String
// - header: array
// - body: string
// + setStatus(status: int, reason: string)
// + setBody(body: string)
// + addHeader(name: string, value: string)
// + getStatus(): string
// + getHeader(): array
// + getBody(): string

//     public function __destruct ()
//     {
//         echo "RIP madafaka";
//     } 