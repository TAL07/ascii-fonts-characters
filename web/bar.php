<?php
$pswd = [
    "fifi",
    "riri",
    "secret",
    "loulou",
];



$url = "http://localhost/formation-php/web/foo2.php";
foreach ($pswd as $value) {
    $data = [
        "user" => "consultant@sereen.fr",
        "pswd" => $value,
        "token" => "?"
    ];
    $body = file_get_contents($url, false, stream_context_create(
        [
            "http" => [
                "method" => "POST",
                "header" => "content-Type: application/x-www-form-urlencoded",
                "content" => http_build_query($data) 
            ]
        ]
    ));
    var_dump($body);
   
}