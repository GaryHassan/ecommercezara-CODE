<?php session_start(); ?>
<?php require 'connexionBDD.php'; ?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="commande.css">
    
    
    <title>ZARA HOMME</title>
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
            <a href="connexion.php" style="text-decoration:none" id="seconnecter">ESPACE MEMBRE</a>
        </button>
    </tr>
    <?php } ?>
</table>

</div> 

</div>





<div class="col-md-12">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Suivi de commande</h2><h3 class="pull-right">Numéro # 12345</h3>
    		</div>
			<?php if (!empty($_SESSION['commande'])) {?>
    		<hr>
			<?php foreach ($_SESSION['commande'] as $id_commade) {
                $req =$bdd->query('SELECT * FROM user WHERE id_user='.$id_commande);

                while ($row = $req->fetch()) {
					?>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Livré à:</strong><br>
					<?php echo $row['prenom_user'],['nom_user']; ?><br>
					<?php echo $row['numero_adr'],['complement_adr'],['rue_adr']; ?><br>
					<?php echo $row['code_postal_adr'],['ville_adr']; ?><br>
    				</address>
    			</div>
    			
    		</div>
    		<div class="row">
    			<div class="date">
    			
    				<address>
    					<strong>Date de la commande:</strong><br>
    					<?php echo $row['date_cmd']; ?><br><br>
    				</address>
    			</div>
                </div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Produits commandés</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Produit</strong></td>
        							<td class="text-center"><strong>Prix</strong></td>
        							<td class="text-center"><strong>Quantité</strong></td>
        							<td class="text-right"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td><?php echo $row['titre_pdt']; ?></td>
    								<td class="text-center"><?php echo $row['prix_pdt']; ?></td>
    								<td class="text-center">1</td>
    								<td class="text-right">$10.99</td>
    							</tr>
                               
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Sous-total</strong></td>
    								<td class="thick-line text-right">$670.99</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Frais de livraison</strong></td>
    								<td class="no-line text-right">$15</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">$685.99</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>

</div>
<a href="#" class="top"><img src="flechehaut.ico"></a>



</html>