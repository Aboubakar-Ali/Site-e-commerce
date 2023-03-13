<?php
// vidange cookie auth 
setcookie(md5('AUTH_KEY'), '', time()+365*48*3600);
// redirection du user sur la page d'acceuil
header('Location: /');
?>