<?php

if (isset($_POST['prdcts'])) {
    foreach ($_POST['prdcts'] as $id => $prdct) {
        foreach ($prdct as $k => $v) {
            $sql = "UPDATE Product SET $k = '$v' WHERE id_product = $id;";
            $prdctFetch = $pdo->query($sql);
        }
    }
}
if (isset($_POST['add_prdct'])) {
    $prdctFetch = $pdo->query("INSERT INTO Product (name) VALUES ('');");
}
if (isset($_POST['rmv_prdct'])) {
    $id = $_POST['rmv_prdct'];
    $prdctFetch = $pdo->query("DELETE FROM Product WHERE id_product = $id;");
}

if (isset($_POST['stock'])) {
    foreach ($_POST['stock'] as $id => $prdct) {
        foreach ($prdct as $k => $v) {
            try{
                $prdctFetch = $pdo->query("UPDATE Stock SET $k = '$v' WHERE id_stock = $id;");
            }catch(Exception $e) {
                header('Location: /admin/products');
            }
        }
    }
    header('Location: /admin');
}
if (isset($_POST['add_stock'])) {
    $prdctFetch = $pdo->query("INSERT INTO Stock (id_product) VALUES (".$_POST['add_stock'].");");
}
if (isset($_POST['rmv_stock'])) {
    $id = $_POST['rmv_stock'];
    $prdctFetch = $pdo->query("DELETE FROM Stock WHERE id_stock = $id;");
}

if (!empty($_POST)){
    header('Location: /admin/products/');
}