<?php
include("../../connexion/connexion.php");
if (isset($_POST['valider'])){
    $modele=$_GET['idgateau'];
    $prix=$_GET['prix'];
    $client=$_SESSION['client'];
    $information=htmlspecialchars($_POST['information']);
    $date=htmlspecialchars($_POST['datelivraison']);
    $datecommande=date('Y-m-d h:m:s');
    echo $datecommande;
    $req=$connexion->prepare("INSERT into commande_gateau(client,modele,prix,information,date_commande,date_livraison,enligne) values(?,?,?,?,?,?,?)");
    $req->execute(array($client,$modele,$prix,$information,$datecommande,$date,1));
    if($req)
    {
        header('location:../../commande.php#cake');
    }
       
  
    
}