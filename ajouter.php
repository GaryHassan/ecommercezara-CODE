
<?php

if(!empty($_GET['id_produits']))

    $_SESSION['panier']=array();
    array_push($_SESSION['panier'],$_GET['id_produits']);
    var_dump($_SESSION['panier']);

?>