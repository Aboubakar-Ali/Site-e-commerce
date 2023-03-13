<?php

// verification si l'utilisateur à bien validé le formuaire
if(isset($_POST['validate'])){

    // verification si l'utilisateur à complété tout les champs
    if(!empty($_POST['pseudo']) &&  !empty($_POST['password'])) {

        // htmlspecialchars pour la sécurité, empécher le user à ingéré un code html
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);

        // verification existance(via pseudo) du user
        $rows = [];
        $chechkIfUserExists = $pdo->prepare('SELECT * FROM User WHERE pseudo = ?');
        $chechkIfUserExists->bindParam(1, $user_pseudo);
        $chechkIfUserExists->execute();
        $result = $chechkIfUserExists->fetchAll();
        foreach ( $result as $row ) {
            $rows[]=$row;
        }

        if(count($rows) > 0){
            // recuperation données du user
            $usersInfos = $rows[0];
            // verificatin unicité du mdp
            if(password_verify($user_password, $usersInfos['password'])){
                // authentifié le user sur le site
                setcookie(md5('AUTH_KEY'), $usersInfos['id_user'], time()+365*48*3600);
                // redirection du user sur la page d'acceuil
                header('Location: /');
            }else {
                $msgError = "Votre mot de passe est incorect...";
            }
        }else{
            $msgError = "Votre pseudo est incorect...";
        }
    }else{
        $msgError = "Veuillez completer tous les champs!";
    }
}

?>