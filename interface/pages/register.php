<?php

require('scripts/register.php');

?>

<link rel="stylesheet" href="/styles/stylelogin.css">
<div class="login-container">
    <form class="form-container" method="POST">
        <h1>Inscription</h1>
        <?php 
            if(isset($msgError)){echo '<p>'.$msgError.'</p>'; }
        ?>
        <form action="#">
        <div class="control">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
        </div>
        <div class="control">
            <label for="firstname">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="control">
            <label for="firstname">Birthday</label>
            <input type="date" class="form-control" name="birthday">
        </div>
        <div class="control">
            <label for="firstname">Number</label>
            <input type="tel" class="form-control" name="number">
        </div>
        <div class="control">
            <label for="pwd">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="control">
            <input type="submit" name="validate" value="singup">
        </div>
        <div class="link">
        <a href="loging.php"></p>J'ai un compte, je m'identifie</P></a>
        </div>  
        </form>
    </form>
</div>