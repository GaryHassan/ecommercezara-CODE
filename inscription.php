<?php
$host = "localhost";
$name = "zara_bdd";
$user = "root";
$pass = "";
$DB = new PDO("mysql:host=$host;dbname=$name",$user,$pass);

// Hachage du mot de passe
if(!empty($_POST['nom_user']) &&
  !empty($_POST['prenom_user']) &&
  !empty($_POST['pseudo_user']) &&
  !empty($_POST['date_user']) &&
  !empty($_POST['email_user']) &&
  !empty($_POST['mdp_user'])){

  $query = $DB->prepare("INSERT INTO user (nom_user,prenom_user,pseudo_user,date_user,email_user,mdp_user)
  VALUES (:nom_user, :prenom_user, :pseudo_user, :date_user, :email_user, :mdp_user)");


  $reponse = $query->execute(array(
    'nom_user'         => $_POST['nom_user'],
    'prenom_user'      => $_POST['prenom_user'],
    'pseudo_user'        => $_POST['pseudo_user'],
    'date_user'           => $_POST['date_user'],
    'email_user'        => $_POST['email_user'],
    'mdp_user'  => $_POST['mdp_user'],
    
  ));
  if($reponse){
    header('Location: formulaire_connexion.php');
  }
}
