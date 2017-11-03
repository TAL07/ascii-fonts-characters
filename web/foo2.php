<?php

// session_start();






// if (!($userAgent = filter_input(INPUT_SERVER, "HTTP_USER_AGENT")) 
//     || !($ip = filter_input(INPUT_SERVER, "REMOTE_ADDR"))) {
//     header ("HTTP/1.1 500 Internal Server Error");
//     exit;

// } else if (!array_key_exists("user", $_SESSION)) {

    
//     $_SESSION["user"] = [
//         "userAgent" => $userAgent,
//         "token" => password_hash(uniqid(), PASSWORD_DEFAULT),
//         "ip" => $ip,
//         "time" => time(),
//     ] ;

// } else if($userAgent !== $_SESSION["user"]["userAgent"]
//         || $ip !== $_SESSION["user"]["ip"]) {
//             session_destroy();   //on detruit fichiers plats stockes au niv des sessions
//     die("banane");

// }

// //$_SESSION["count"]++;

// var_dump($_SESSION);                  //ns donne droit de faire affectation ds tableau session


//pages publics
session_start();

if(!array_key_exists("token", $_SESSION)) {
    $_SESSION["token"] = uniqid();
}

$token = filter_input(INPUT_POST, "token");

if ($token && $token !== $_SESSION["token"]) {
        die ("hmm hmm");
}

var_dump($_POST);
$user= filter_input(INPUT_POST, "user");
$pswd = filter_input(INPUT_POST, "pswd");
if ($user === "consltant@sereen.fr" && $pswd === "secret") {
    die ("ok");
}
?>

<form action="" method="POST">
    <input name="user" />
    <input name="pswd" />
    <input name="token" type="hidden" value="<?= $_SESSION["token"] ?>"
    <input type="submit" />

</form>