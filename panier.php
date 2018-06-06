<?php session_start(); ?>
<?php require 'connexionBDD.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="panier.css">
    
    <title>PANIER</title>
</head>
<body>
<div id="bande_logo"></div>
<a href="accueil.php"><img src="zara.png" id="logo"></a>    



<div class="row">
<ul id="menu_horizontal" class="menu_horizontal">
<div id="col-md-12">
    <center>
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
    <tr><button class="enfants">
    <?php if(!empty($_SESSION['nom'])){
    echo  $_SESSION['nom'];?>
    </button></tr>
    <tr><button id="deconnexion"><a href="deconnexion.php" style="text-decoration:none" id="deconnexion">Deconnexion</a></button></tr>
    <?php
}else{
    ?>
    <tr>
    <tr>
        <button id="seconnecter">
            <a href="formulaire_connexion.php" style="text-decoration:none" id="seconnecter">ESPACE MEMBRE</a>
        </button>
    </tr>
    <?php } ?>
</table>
</center>
</div> 
</ul>
</div>

<div class="row5">
    <center><h1>MON PANIER</h1></center>
</div>

<div class="border">
<?php
if(isset($_GET['action']) and $_GET['action'] == 'vider'){
    //vider le panier
    $_SESSION['panier'] = array();
}
if(isset($_GET['suppr'])){
    //On récupere la clé du produits à supprimer
    $key=array_search($_GET['suppr'], $_SESSION['panier']);
    //on supprime la ligne dans le tableau $_SESSION['panier']
    unset($_SESSION['panier'][$key]);

}
    $total=0;
?>
<?php if (!empty($_SESSION['panier'])) {?>

    <div class="row2">

            <?php foreach ($_SESSION['panier'] as $id_objet) {
                $req =$bdd->query('SELECT * FROM produit WHERE id_produit='.$id_objet);

                while ($row = $req->fetch()) {
            ?>
            <div class="col-md-12">
                <table>
                    <tr>
                        <td><img src="photos/<?php  echo $row['photos_pdt'];?>" alt=""></td>
                        <td><?php echo $row ['titre_pdt'] ?></td>
                    </tr>
                </table>
                
            </div> <!-- row=ligne -->
            <div class="col-md-7">
                        <?php echo $row['prix_pdt']; ?> €
                        <a class=suppr href="panier.php?suppr=<?php echo $row['id_produit']; ?>"> Supprimer </a></td>
                    </div>

            <br>
            
            <?php $total = $total + $row ['prix_pdt']; ?>
            
            <?php }
            } ?>
        <br />  
        <div class="col-md-12">
        <tr>
            <td>Total</td>
            <td></td>
            <td><?php echo $total ?> €</td>
            <td></td><br>
            <td><a class="suppr" href="panier.php?action=vider">Vider le panier</a></td>
            <th></th>
            <td><a href="commande.php"><button class="commande">COMMANDER</button></a</td>

        </tr>
        </table>
        </div>
    </div>
    <div class="row3">
        <div class="col-md-12">
    <?php } ?>
    <div class="row4">
        
           <center>
               <h5> <?php if ($total==0) 
            {
                echo "VOTRE PANIER EST VIDE ...";
            }

            ?> </h5>
            </center>
        

        </div>
    </div>
</div>
</body>
<!--
<footer id="footer" class="footer">

    <div id="contenu" class="contenu">
        <div= id="acheter">
            <h3 class="footer-list">ACHETER</h3>
            <ul class="footer-list">
            <li><a href="femme.php" style="text-decoration:none" class="item">FEMME</a></li>
            <li><a href="homme.php" style="text-decoration:none" class="item">HOMME</a></li>
            <li><a href="enfant.php" style="text-decoration:none" class="item">ENFANT</a></li>
            </ul>
        </div>

        <div id="infos">
            <h3 class="footer-list">INFOS</h3>
            <ul class="footer-list">
            <li><a href="" style="text-decoration:none" class="item">A propos</a></li>
            <li><a href="" style="text-decoration:none" class="item">Défilé</a></li>
            <li><a href="" style="text-decoration:none" class="item">Zara autour du monde</a></li>
            <li><a href="" style="text-decoration:none" class="item">Presse</a></li>
            <li><a href="" style="text-decoration:none" class="item">Les stars défilent pour Zara</a></li>
            </ul>
        </div>

        <div id="aide">
            <h3 class="footer-list">AIDE</h3>
            <ul class="footer-list">
            <li><a href="" style="text-decoration:none" class="item">Service Clients</a></li>
            <li><a href="" style="text-decoration:none" class="item">Retours</a></li>
            <li><a href="zarastore.php" style="text-decoration:none" class="item">Nos ZaraStore</a></li>
            <li><a href="" style="text-decoration:none" class="item">Nous contacter</a></li>
            <li><a href="" style="text-decoration:none" class="item">Mention légales</a></li>
            </ul>
        </div>

        <div= id="member">
            <h3 class="footer-list">Devenez ZaraMember</h3>
            <ul class="footer-list">
            <p class="item">Rejoignez-nous maintenant et bénéficiez des frais de ports offerts !</p>
            <form action="./inscription.php" method="post" id="inscription">
             </br>
                <button type="submit" value="Inscription" id="boutoninscr"><strong>DEVENIR MEMBRE</strong></button>
            </form>
            </ul>
        </div>

        <div id="logofooter">
        <a href="accueil.php"><img src="zaralogofooter.png"></a>
        </div>

        <div id="texte">
            <p>Le concept de Zara est de mettre en vente des articles à des prix très accessibles en s'inspirant des modèles des grandes maisons de la mode internationale.</p>
        </div>   

        <div id="social">
            <li><a href="https://www.facebook.com/Zara" style="text-decoration:none" target="blank" class="item"><img src="fb.svg"></a></li>
            <li><a href="https://www.instagram.com/zara/" style="text-decoration:none" target="blank" class="item"><img src="insta.svg"></a></li>
            <li><a href="https://twitter.com/ZARA" style="text-decoration:none" target="blank" class="item"><img src="twi.svg"></a></li>
            <li><a href="https://es.pinterest.com/zaraofficial" style="text-decoration:none" target="blank" class="item"><img src="pint.svg"></a></li>
            <li><a href="http://www.youtube.com/zara" style="text-decoration:none" target="blank" class="item"><img src="yt.svg"></a></li> 
        </div>
</footer>  
        -->
</html>