<!-- ici le listing des produits recuperer en bdd -->
<?php session_start(); ?>
<?php require 'connexionBDD.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>JEANS FEMME</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="listeproduits.css">
    <link rel="stylesheet" href="femme.css">
</head>
<body>

<div id="bande_logo"></div>
<a href="accueil.php"><img src="zara.png" id="logo"></a>    



<div class="row2">

<div class="col-md-12">
<table>
<tr>
    <button class="accueil">
        <a href="accueil.php" class="accueil" style="text-decoration:none" >ACCUEIL</a>
    </button>
</tr>
<tr>
    <button class="femme">
        <a href="femme.php" class="femme" style="text-decoration:none" >FEMME</a>
    </button>
</tr>
<tr>
    <button class="homme">
        <a href="homme.php" style="text-decoration:none" class="homme">HOMME</a>
    </button>
</tr>
<tr>
    <button class="enfants">
        <a href="enfants.php" style="text-decoration:none" class="enfants">ENFANT</a>
    </button>
</tr>
<tr>
    <button class="panier">
        <a href="panier.php" style="text-decoration:none" class="panier">PANIER</a>
    </button>
</tr>
<tr><button class="panier">
<?php if(!empty($_SESSION['nom'])){
echo  $_SESSION['nom'];?>
</button></tr>
<tr><button id="deconnexion"><a href="deconnexion.php" style="text-decoration:none" id="deconnexion">Deconnexion</a></button></tr>
<?php
}else{
?>
<tr>
    <button id="seconnecter">
        <a href="formulaire_connexion.php" style="text-decoration:none" id="seconnecter">ESPACE MEMBRE</a>
    </button>
</tr>
<?php } ?>
</table>
</div> 

</div>






    
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
    <div class="title">
    <div class="col-md-12">
    <center><h2>JEANS FEMME</h2></center>
    </div>
    </div>
    
            
            
    <div class="row">
        <?php $req = $bdd->query('SELECT * FROM produit WHERE id_categorie= 1 AND id_sous_ctg= 4'); ?> <!-- on demande les articles de la table produits -->
        <?php while($row=$req->fetch()) { ?> <!-- fetch permet de recuperer une ligne dans ma base de donnée associé de la boucle while -->
            
            <div class="col-md-3">
                <div id="produits">
                    <div>
                        <img src="photos/femme/jeans/<?php echo $row['photos_pdt']; ?>" alt=""> 
                    </div>
                    <br />                    
                    <div class="row">

                    <div class="col-md-12">
                        <strong><?php echo $row['titre_pdt']; ?></strong>
                    </div>
                  
                    <div class="col-md-7">
                        <?php echo $row['prix_pdt']; ?> EUR
                    </div>

                    <!--<div class="col-md-12">
                        <i> <?php /*echo $row['description_pdt']; */?></i>
                    </div>-->
                        
                    </div>
                   
                    <div>
                        <a href="jeans_femme.php?ajouter=<?php echo $row['id_produit'] ?>"> Ajouter au panier </a>
                    </div>
                </div>
            </div>
        <?php }?>
        </div>
    <!-- <a href="panier.php">Aller au panier'<?php// if(!empty($_SESSION['panier'])) {echo count($_SESSION['panier']); }?>)</a>-->

</body>
</html>