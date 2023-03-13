<?php

require('scripts/adminUpdates.php');

?>

<?php

if (empty($query)){

?>

    <a href="/admin/products"><button type="button">Produits</button></a>
    <a href="/admin/users"><button type="button">Utilisateurs</button></a>

<?php

}else{

    if (!in_array($query.'.php', scandir("interface/pages/admin/"))) {
        header('Location: /admin');
    }

    include("interface/pages/admin/$query.php");

}

?>