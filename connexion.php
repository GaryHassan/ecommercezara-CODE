<?php session_start();?>
<?php require 'connexionBDD.php'; ?>
<?php
        if(isset($_POST['connect'])){    
            $pseudo=$_POST['pseudo'];
            $mdp=$_POST['mdp'];
            $req=$bdd->prepare('SELECT * FROM user WHERE pseudo_user = :pseudo AND mdp_user = :mdp');
            $req->execute(array('pseudo' => $_POST['pseudo'],'mdp' =>$_POST['mdp']));

            if($req->rowCount()==0){
                echo 'Pseudo ou mot de passe incorrect';
            }else{
                while($row=$req->fetch()){
                    $_SESSION['id_user']=$row['id_user'];
                    $_SESSION['nom']=$row['nom_user'];
                    $_SESSION['email']=$row['email_user'];

                    header('Location: accueil.php');
                }
            }
        }
    ?>