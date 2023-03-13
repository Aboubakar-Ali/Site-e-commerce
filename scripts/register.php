<?php


// verification si l'utilisateur à bien validé le formuaire
if(isset($_POST['validate'])){

    // verification si l'utilisateur à complété tout les champs
    if(!empty($_POST['pseudo']) && /*!empty($_POST['lastname']) && !empty($_POST['firstname']) &&*/ !empty($_POST['password']) && !empty($_POST['birthday']) && !empty($_POST['number']) && !empty($_POST['email'])) {
        // htmlspecialchars pour la sécurité, empécher le user à ingéré un code html
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        // $user_lastname = htmlspecialchars($_POST['lastname']);
        // $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_birthday = htmlspecialchars($_POST['birthday']);
        $user_number = htmlspecialchars($_POST['number']);
        $user_email = htmlspecialchars($_POST['email']);
        

        // verification de l'existence du user

        $rows = [];
        $chechkIfUserExists = $pdo->prepare('SELECT * FROM User WHERE pseudo = ?');
        $chechkIfUserExists->bindParam(1, $user_pseudo);
        $chechkIfUserExists->execute();
        $result = $chechkIfUserExists->fetchAll();
        foreach ( $result as $row ) {
            $rows[]=$row;
        }

        if (count($rows) == 0){

            // inseré les données dans la bd
            $inserUserOnWebsite = $pdo->prepare('INSERT INTO User(pseudo, /*lastname, firstname,*/ email, date_of_birth, phone_number, password)VALUES(?, /*?, ?,*/ ?, ?, ?, ?)');
            $inserUserOnWebsite->execute(array($user_pseudo, /*$user_lastname, $user_firstname,*/ $user_email, $user_birthday,$user_number, $user_password));

            // recuperons les infos du users
            $rows = [];
            $chechkIfUserExists = $pdo->prepare('SELECT * FROM User WHERE pseudo = ?');
            $chechkIfUserExists->bindParam(1, $user_pseudo);
            $chechkIfUserExists->execute();
            $result = $chechkIfUserExists->fetchAll();
            foreach ( $result as $row ) {
                $rows[]=$row;
            }
            $usersInfos = $rows[0];

            // authentifié le user sur le site
            setcookie(md5('AUTH_KEY'), $usersInfos['id_user'], time()+365*48*3600);

            // redirection du user sur la page d'acceuil
            header('Location: /');

        }else{
            $msgError = "ce user existe déjà sur le site";
        }
    
        
    }else{
        $msgError = "Veuillez completer tous les champs!";
    }
}

?>
