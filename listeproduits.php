<!-- ici le listing des produits recuperer en bdd -->
<?php session_start(); ?>
<?php require 'connexionBDD.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste produits</title>
    <link rel="stylesheet" href="accueil.css">
    <link rel="stylesheet" href="listeproduits.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <?php
            if(!empty($_GET['ajouter'])){
                if(!isset($_SESSION['panier'])){
                //on l'initialise
            $_SESSION['panier'] = array();
        }
            // ajouter le produit au panier, le panier cest quoi : cest un listing de produits que j'ai ajouter
            array_push($_SESSION['panier'],$_GET['ajouter']);
    }
    //div.col 3 creer une class col 3 avec une taille de 200px et un float left, dans cette div on met le texte le prix add to cart//
    ?>
    
        
            
            
    <div class="row">
        <?php $req = $bdd->query('SELECT * FROM produit'); ?> <!-- on demande les articles de la table produits -->
        <?php while($row=$req->fetch()) { ?> <!-- fetch permet de recuperer une ligne dans ma base de donnée associé de la boucle while -->
            
            <div class="col-md-3">
                <div id="produits">
                    <div>
                        <img src="photos/<?php echo $row['image']; ?>" alt=""> 
                    </div>
                    <br />                    
                    <div class="row">
                        <div class="col-md-8"><?php echo $row['titre']; ?></div>
                    
                        <div class="col-md-5"><?php echo $row['prix']; ?> EUR</div>
                    </div>
                   
                    <div>
                        <a href="listeproduits.php?ajouter=<?php echo $row['id_produits'] ?>"> Ajouter au panier </a>
                    </div>
                </div>
            </div>
        <?php }?>
        </div>
    <!-- <a href="panier.php">Aller au panier'<?php// if(!empty($_SESSION['panier'])) {echo count($_SESSION['panier']); }?>)</a>-->

</body>
</html>

