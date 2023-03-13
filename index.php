<?php
include 'scripts/bddConnect.php';
include 'scripts/route.php';
include 'scripts/admin.php';

//test bdd
/* $a = '1';
$query = 'SELECT * FROM user WHERE id_user=:id;';
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $a);
$stmt->execute();
$result = $stmt->fetchAll();
foreach ( $result as $row ) {
  echo '<p>', $row['pseudo'], ' ', $row['email'], '</p>', "\n";
} */


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELYATIA</title>
</head>
<body>
    
    <?php 
    
    $nav_content = [
        true => [
            "home" => "Accueil",
            "logout" => "Deconnexion"
        ],
        false => [
            "main" => "Accueil",
            "login" => "Connexion",
            "register" => "Inscription"
        ]
    ][!empty($_COOKIE[md5('AUTH_KEY')])];
    
    include "interface/comps/nav.php";
    
    ?>
    <div body>
    <?php include "interface/pages/$page.php"; ?>
    </div>
</body>
</html>