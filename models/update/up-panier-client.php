<?php
include('../../connexion/connexion.php');
if(isset($_POST['uppanier']))
{
    $commande=$_SESSION['commande'];
    $produit=$_GET['idproduit'];
    $quantite=htmlspecialchars($_POST['quantite']);
    $req=$connexion->prepare("UPDATE panier set quantite=? where commande=? AND produit=?");
    $req->execute(array($quantite,$commande,$produit));
    if($req){
        header('location:../../voircommande.php');
    }
}
if(isset($_POST['up_gateau']))
{
    $commande=$_GET['com_gateau'];
    $information=htmlspecialchars($_POST['information']);
    $req=$connexion->prepare("UPDATE commande_gateau set information=? where id=? ");
    $req->execute(array($information,$commande));
    if($req){
        header('location:../../voircommande.php?com_gateau');
    }
}
?>