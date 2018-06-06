<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
      
        <link rel="stylesheet" href="connexion.css">
        <title>inscription</title>
        
    </head>
<body>
  
<div id="bande_logo"></div>
<img src="zara.png" id="logo">

  <div class="row">
  <ul id="menu_horizontal" class="menu_horizontal">
  <div id="col-md-12">
      <table>
      <tr><button class="accueil"><a href="accueil.php" class="accueil" style="text-decoration:none" >ACCUEIL</a></button></tr>
      <tr><button class="femme"><a href="femme.php" class="femme" style="text-decoration:none" >FEMME</a></button></tr>
      <tr><button class="homme"><a href="homme.php" style="text-decoration:none" class="homme">HOMME</a></button></tr>
      <tr><button class="enfants"><a href="enfants.php" style="text-decoration:none" class="enfants">ENFANT</a></button></tr>
      <tr><button class="panier"><a href="panier.php" style="text-decoration:none" class="panier">PANIER</a></button></tr>
      <?php if(!empty($_SESSION['nom'])){
          echo  $_SESSION['nom'];?>
          <tr><button id="deconnexion"><a href="deconnexion.php" style="text-decoration:none" id="deconnexion">Deconnexion</a></button></tr>
          <?php
      }else{
          ?>
      <tr><button id="seconnecter"><a href="formulaire_connexion.php" style="text-decoration:none" id="seconnecter">ESPACE MEMBRE</a></button></tr>
      <?php } ?>
  </table>
  </div> 
  </ul>
  </div>
  
<h2 style="color:white" align="center">Devenez membre en quelques clics !</h2>

        <div class="container" align="center">
        <form method="POST" action="inscription.php">
        

            <table>
                <tr>
                    <td align="right">
                
                        <label for="nom">Nom:</label> 
                    </td>
                    <td>
                        <input type="text" placeholder="Entrez votre nom" id="nom_user" name="nom_user" required/>
                    </td>
                </tr>
            <br><br>
                <tr>
                    <td align="right">
                        <label for="prenom">Prénom:</label>
                    </td>
                    <td>
                         <input type="text" placeholder="Entrez votre prénom" id="prenom_user" name="prenom_user" required/>
                    </td>
                </tr>

                <tr>
                    <td align="right">
                        <label for="pseudo">Pseudo:</label>
                    </td>
                    <td>
                         <input type="text" placeholder="Entrez votre pseudo" id="pseudo_user" name="pseudo_user"/>
                    </td>
                </tr>

                <tr>
                    <td align="right">
                        <label for="age">Indiquez votre âge:</label>
                    </td>
                    <td>
                         <input type="date" placeholder="Entrez votre âge" id="date_user" name="date_user"/>
                    </td>
                </tr>

                <tr>
                    <td align="right">
                        <label for="mail">Email:</label>
                    </td>
                    <td>
                        <input type="email" placeholder="Entrez votre e-mail" id="email_user" name="email_user"/>
                    </td>
                </tr>

                <tr>
                    <td align="right">
                        <label for="mdp">Mot de passe:</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Entrez votre mot de passe" id="mdp_user" name="mdp_user"/>
                    </td>
                </tr>

                <tr>
                                <td></td>
                               <td align="center">
                               </br>
                               
                               
                               <input type="submit" name="forminscription" value="S'INSCRIRE"/>
                               </td>
                           </form>
                           
                              
                            </tr>
</table>
</div> 
</ul>
</div>
<div class="connect">
                               <a href="formulaire_connexion.php">Deja un compte ? Se connecter </a>
                            </div>

<?php
if(isset($erreur))
{
    echo '<font color= "#FF010">'.$erreur."</font>";
}
 
?>



</form> 
</div>
</div>
</div>
</div>
    
</body>

  
</html>