

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="inscription.css">
    <title>Inscription</title>
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
        <a href="connexion.php" style="text-decoration:none" id="seconnecter">ESPACE MEMBRE</a>
    </button>
</tr>
<?php } ?>
</table>
</div> 
</ul>
</div>

<?php
if(isset($erreur))
{
    echo '<font color= "#FF010">'.$erreur."</font>";
}
 
?>
<div class="row">
<div id="borderinscription">
<div class="col-md-12">
<form action="connexion.php" method="post" id="inscription">
    <table>
        </br>
        <h2>OÙ HABITEZ VOUS ?</h2> </br></br>
               

                <label><strong>Numéro</strong></label> </br>
            </br>
                <input type="text" name="numero"  class="numero" placeholder=" N°" required></br>
                </br>
                
                <label><strong>Complément d'adresse</strong></label> </br>
            </br>
                <input type="text" name="complement"  class="complement" placeholder=" Bis/Ter"></br>
                </br>

                <label><strong>Rue</strong></label> </br>
            </br>
                <input type="text" name="rue" class="rue" placeholder=" Rue" required></br>
                </br>

                <label><strong>Code postal</strong></label> </br>
            </br>
                <input type="text" name="codepostal" class="codepostal" placeholder=" Code postal" required></br>
                </br>

                <label><strong>Ville</strong></label> </br>
            </br>
                <input type="text" name="ville" class="ville" placeholder=" Ville" required></br>
                </br>  
            
            </br>
                <label><strong>Pays</strong></label> </br>
            </br>
                <input type="text" name="pays"  class="pays" placeholder=" Pays" required></br>
                </br>


                <button type="submit" name="formadresse" value="S'inscrire" id="bouton">S'INSCRIRE</button>
        </br> </br> </br>
</form> 
<form action="./connexion.php" method="post" id="connexion">
<label><strong>Vous êtes déjà membre ?  Connectez-vous !</strong></label>
        </br> </br> 
                <button type="submit" value="connexion" id="bouton">SE CONNECTER</button>
</form>
</div>
</div>
</div>
    
</body>








</html>