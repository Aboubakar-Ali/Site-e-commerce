<?php

$usrsFetch = $pdo->query('SELECT id_user, admin, pseudo, email, date_of_birth, phone_number FROM User');
$users = $usrsFetch->fetchAll();

$prdctFetch = $pdo->query('SELECT * FROM Product');
$prdct_ = $prdctFetch->fetchAll();
$prdcts = $prdct_;
foreach ($prdcts as $k => $v){
    $prdcts[$k]["stock"] = [];
}

$stockFetch = $pdo->query('SELECT * FROM Stock');
$stock_ = $stockFetch->fetchAll();
?>