<?php

require('scripts/login.php');

?>

<link rel="stylesheet" href="/styles/stylelogin.css">
<div login class="login-container">
    <form class="form-container" method="POST">
        <h1>Connexion</h1>
        <?php 
            if(isset($msgError)){echo '<p>'.$msgError.'</p>'; }
        ?>
        <form action="#">
            <div class="control">
                <label for="name">Pseudo</label>
                <input type="text" class="form-control" name="pseudo">
            </div>
            <div class="control">
                <label for="pwd">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <span><input type="checkbox">Remember me</span>
            <div class="control">
                <input type="submit" name="validate" value="Login">
            </div>
            <div class="link">
            <a href="forgot.php">Mot de passe oublié</a>
            <a href="signup.php"></p>Je n'ai pas de compte, je m'inscris</P></a>
            </div>  
        </form>
    </form>
</div>