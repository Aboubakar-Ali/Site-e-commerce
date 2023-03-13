<?php

try{
    $pdo = new PDO('sqlite:'.dirname(__FILE__).'/../database/data_site.db');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
    die();
}

$admin = [];
$chechkIfUserExists = $pdo->prepare('SELECT id_user, admin FROM User');
$chechkIfUserExists->execute();
$result = $chechkIfUserExists->fetchAll();
foreach ( $result as $row ) {
    $admin[$row["id_user"]]=$row["admin"];
}

?>