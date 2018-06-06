<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>formulaire-administrateur</title>
  </head>
  <body>
    <?php
    $tabErreurs= array();

        if (isset($_POST['btnAjout']))
        {
        if (empty($_POST["txtdesignation"]))
        {
            array_push($tabErreurs,"Designation manquantes !");
        }
        if (empty($_POST["txtprix"]))
        {
            array_push($tabErreurs,"Prix manquant !");
        }
        if (!is_numeric($_POST["txtprix"]))
        {
            array_push($tabErreurs,"Prix invalide !");
        }
        if (empty($_FILES["txtphoto"]["name"]))
        {
            array_push($tabErreurs,"Photo manquantes !");
        }
        //print_r($_FILES["txtphoto"]);
        if (count($tabErreurs) == 0)
        {
        //INSERTION DE BDD
        try
        {
            $Link = new PDO("mysql:host=localhost;dbname=zara;","root","");

            $sth = $Link->prepare('INSERT INTO produits(image, titre, prix, description) VALUES(:image, :titre, :prix, :descr)');
            $designation= $_POST['txtdesignation'];
            $prix= $_POST['txtprix'];

            
            $heurecourante= time();
            $extention= pathinfo($_FILES["txtphoto"]["name"])["extension"];
            $nomPhoto= $heurecourante.".".$extention;

            $fich= $nomPhoto;



            $sth->bindParam(':des',$designation, PDO::PARAM_STR,30);
            $sth->bindParam(':prix',$prix, PDO::PARAM_STR);
            $sth->bindParam(':fichier',$fich, PDO::PARAM_STR);
            $sth->execute();
            echo "Insertion OK";

            if (move_uploaded_file($_FILES['txtphoto']['tmp_name'],"Photos/".$fich) == true)
            {
                echo "<br/>Déplacement OK";
                echo "<img src='Photos/($fich)'/>";
            }
            else
            {
                array_push($tabErreurs, "Echec déplacement");
            }

        }
        catch(PDOException $e){
            echo 'Echec connexion :'.$e->getMessage();
        }
    }
}

    ?>

    <form class="" method="post" enctype="multipart/form-data">
<p>
      <label for="txtdesignation"><b>Designation</b></label><br/><br/>
            <input type="text" name="txtdesignation" value="" placeholder=""class="txtdesignation"id="txtdesignation">
            </p>
<p>
      <label for="txtprix"><b>Prix</b></label><br/><br/>
            <input type="text" name="txtprix" value="" placeholder=""class="txtprix"id="txtprix">
            </p>
<p>
      <label for="txtphoto"><b>Photo</b></label><br/>
            <input type="file" name="txtphoto" value="" placeholder=""class="txtphoto" id="txtphoto"><br/>
</p>
    <input type="submit" name="btnAjout"id="btnAjout" value="Ajouter un produit">

    </form>

<?php



    if (count($tabErreurs) > 0 )
    {
    echo "<ul>";
    foreach ($tabErreurs as $err) {
        echo "<li>{$err}</li>";
    }
    echo "<ul>";
    }
    else
    {
  
    }

    ?>

  </body>
</html>