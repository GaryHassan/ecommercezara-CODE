<?php session_start(); ?>
<?php require 'connexionBDD.php'; ?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="accueil.css">
    
    <title>ZARA</title>
</head>
<body>
<div id="bande_logo"></div>
<a href="accueil.php"><img src="zara.png" id="logo"></a>    


<div class="row">
<ul id="menu_horizontal" class="menu_horizontal">
<div id="col-md-12">
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
</ul>
</div>





<div id="video" class="video">
    <video src="zaravideo.mp4" autoplay="true" loop height="600px" width="1000px" muted="muted"></video>
</div>




<div class="categ">
<div class="col-md-12">
<div class="banniere">
    <table>
    
        <tr>
        <th><a href="femme.php"><img class="women" src="women.jpg"></a></th>
        <td></td>
        <th><a href="homme.php"><img src="men.jpg"></a></th>
        <th></th>
        <th><a href="enfants.php"><img src="kids.jpg"></a></th>
        </tr>
    

    
        <tr>
        <th><a href="femme.php" class="woman" style="text-decoration:none">FEMME</th>
        <th></th>
        <th><a href="homme.php" style="text-decoration:none">HOMME</th>
        <th></th>
        <th><a href="enfants.php" style="text-decoration:none">ENFANT</a></th>
        </tr>
    
</table>
</div>
</div>
</div>

<div id="bandeau1"></div>
    <div class="collecfemme"><a href="femme.php"><img src="collecfemme.jpg" height="400px" width="500px"></a><br/>
</div>

   <a href="femme.php" style="text-decoration:none; color:grey"> <button id="boutonfemme">FIND YOUR FAVORITES</a></button>


<div id="bandeau2"></div>
    <div class="collechomme"><a href="homme.php"><img src="collechomme.jpg" height="400px" width="500px"></a><br/></div>
    
<div id="bandeau3"></div>
    <div class="colleckids"><a href="enfants.php"><img src="colleckids.jpg" height="400px" ></a><br/></div>

<div id="video2" class="video2">
    <video src="zaravideo3.mp4" autoplay="true" loop height="500px" width="600px" muted="muted">Ici la description alternative</video>
    <p>Zara Femme | Automne -Hiver 2017</p>
</div>
</body>
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