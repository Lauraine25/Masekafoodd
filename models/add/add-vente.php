<?php
include("../../connexion/connexion.php");
if(isset($_POST['newcommande']))
{
    $client=htmlspecialchars($_POST['client']);
    $date=date('Y-m-d h:m:s');
    $req=$connexion->prepare("INSERT into commande(dates,client) values(?,?)");
    $req->execute(array($date,$client));
    if($req)
    {
        $reqe=$connexion->prepare("SELECT * FROM commande where  client=? ORDER BY id DESC limit 1");
        $reqe->execute(array($client));
        $com=$reqe->fetch();
        $commande=$com['id'];
        echo $commande;
        if($reqe)
        {
            header("location:../../views/vendre.php?com=$commande");
        }
    }
     
  
}
if (isset($_POST['valider'])){
    $produit=htmlspecialchars($_POST['produit']);
    $req=$connexion->prepare("SELECT prix  from produit where id=?");
    $req->execute(array($produit));
    $selPrix=$req->fetch();
    $prix=$selPrix['prix'];
    $quantite=htmlspecialchars( $_POST['qte']);
    $commande=$_GET['commande'];
    $req=$connexion->prepare("INSERT into panier(commande,produit,quantite,prixunitaire) values (?,?,?,?)");
    $req->execute(array($commande,$produit,$quantite,$prix));
    if($req)
    {
        $_SESSION['notif']="Un element vient d'etre ajouter dans le panier";
        header("location:../../views/vendre.php?com=$commande");
    }

    
    
}


?>