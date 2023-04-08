<?php

$db_user = "root";
$db_pass = "msn3459900";
$db_name = "iti_assiut";

// $db = new PDO('mysql:host=localhost;dbname='.$db_name.";",$db_user,$db_pass);

try{
    $dsn = 'mysql:dbname=iti_assiut;host=127.0.0.1;port=3306;';
    $db = new PDO($dsn, $db_user, $db_pass);
    if($db){
        
    }
}catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>