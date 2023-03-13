<?php


//recupération de la route sur $route
@list(, $page, $query) = explode('/', str_replace(dirname($_SERVER['PHP_SELF']), '', $_SERVER['REQUEST_URI']), 3);

//si la rout est vide ou ne fait pas partie des routes enregistrées, on renvoie à /main ou /home selon la présence du cookie md5('AUTH_KEY')

$authKey = @$_COOKIE[md5('AUTH_KEY')];
$auth = !empty($authKey);

function addPage() {
    list($pages_, $auth, $path) = func_get_args();
    $args = array_slice(func_get_args(), 2);
    $pages_[$auth][$path] = array_combine(["path", "namePage", "inNav"], $args);
    file_put_contents("interface/pages/$path.php", '', FILE_APPEND);
    return $pages_;
}

$pages = [];

if($auth && !($admin[$authKey] == null)){
    $pages = addPage($pages, true, 'admin', 'Admin', true);
}
$pages = addPage($pages, true, 'home', 'Accueil', true);
$pages = addPage($pages, true, 'logout', 'Deconnexion', true);
$pages = addPage($pages, false, 'main', 'Accueil', true);
$pages = addPage($pages, false, 'login', 'Connexion', true);
$pages = addPage($pages, false, 'register', 'Inscription', true);

$redir = array_keys($pages[$auth]);
if ($page == '' or !in_array($page,$redir)){
    header("Location: /".$redir[0]);
}

//echo "<pre>";
$inNav = array_diff(array_column($pages[$auth], 'inNav', 'path'),[false]);
foreach($inNav as $key => $value){
    $inNav[$key] = array_column($pages[$auth], 'namePage', 'path')[$key];
}
//print_r($inNav);
//echo "</pre>";

?>