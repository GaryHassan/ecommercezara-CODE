<?php session_start(); ?>
<?php require 'connexionBDD.php'; ?>
<?php


if(isset($_POST['formadresse']))
{ 
   if(!empty($_POST['numero']) AND !empty($_POST['complement']) AND !empty($_POST['rue']) AND !empty($_POST['codepostal']) AND !empty($_POST['ville']) AND !empty($_POST['pays']))
    {
       $numero = htmlspecialchars ($_POST['numero']);
       $complement = htmlspecialchars ($_POST['complement']);
       $rue = htmlspecialchars ($_POST['rue']);
       $codepostal = htmlspecialchars ($_POST['codepostal']);
       $ville = htmlspecialchars ($_POST['ville']);
       $pays = htmlspecialchars($_POST['pays']); //cryptage du mdp

      
        $insertmbr = $bdd->prepare("INSERT INTO adresse (numero_adr, complement_adr, rue_adr, code_postal_adr , ville_adr, pays_adr) VALUES (:numero, :complement, :rue , :codepostal , :ville, :pays)");
        $insertmbr->execute(
        array('numero' => $numero,
              'complement' =>  $complement,
              'rue' =>  $rue, 
              'codepostal' =>  $codepostal,  
              'ville' => $ville, 
              'pays' => $pays
        ));
            $erreur = "Votre compte a bien été créer !";
                echo $erreur;
                header('Location: connexion.php');
                    }
            }
        
       

                    /*else
                    {
                        $erreur = "Vos mots de passes ne correspondent pas !";
                    }
                }
                else
                {
                    $erreur = "Adresse mail deja utilisés!";
                }

            
            }
        else{
            $erreur = "Vos adresses mail ne correspondent pas !";
        }
       }
       else
       {
        $erreur = "Votre pseudo ne doit pas dépassser 50 charactères !";
       }
       }
        else
        {
        $erreur="Tous les champs doivent être complétés !";
    } */

?>

