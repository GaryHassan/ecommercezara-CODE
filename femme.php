<?php session_start();?>
<?php require 'connexionBDD.php'; ?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="femme.css">
    
    <title>ZARA</title>
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




<!--<div class="contener_slideshow">
    <div class="contener_slide">
    <div class="slid_1"><img src="zarafemme1.jpg"></div>
    <div class="slid_2"><img src="zarafemme2.jpg"></div>
    <div class="slid_3"><img src="zarafemme3.jpg"></div>
    </div>
</div>-->


<div class="col-md-12">

    <div id="video" class="video">
    <video src="zarawomen.mp4" autoplay="true" loop height="500px" width="900px" muted="muted"></video>
</div>
</div>

<div class="row">
        <div class="col-md-12">
            <table class="table">
            <tr>
                <th><a href="robes_femme.php"><img class="robes" src="categories/robes_f.jpg"></th>
                <th></th>
                <th><a href="jeans_femme.php"><img class="jeans" src="categories/jeans_f.jpg"></th>
                <th></th>
                <th><a href="sweats_femme.php"><img class="sweats" src="categories/sweat_f.jpg"></th>
                <th></th>
                <th><a href="jupes_femme.php"><img class="jupes" src="categories/jupes_f.jpg"></th>
            </tr>

            <tr>
                <td><a href="robes_femme.php" class="robes" style="text-decoration:none; color:white">ROBES</a></td>
                <th></th>
                <td><a href="jeans_femme.php" class="jeans" style="text-decoration:none; color:white">JEANS</a></td>
                <th></th>
                <td><a href="sweats_femme.php" class="sweats" style="text-decoration:none; color:white">SWEATS</a></td>
                <th></th>
                <td><a href="jupes_femme.php" class="jupes" style="text-decoration:none; color:white">JUPES</a></td>
            </tr>
            </table>
    </div>
</div>
        


</div>




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
</html>