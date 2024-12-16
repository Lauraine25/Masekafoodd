<?php

$SelData=$connexion->prepare("SELECT client.nom,client.postnom,client.prenom,client.photo,commande.dates,commande.id from client,commande where client.id=commande.client AND commande.enligne=? AND commande.statut=? ORDER BY commande.id DESC");
$SelData->execute(array(1,1));
$SelData_servie=$connexion->prepare("SELECT client.nom,client.postnom,client.prenom,client.photo,commande.dates,commande.id from client,commande where client.id=commande.client AND commande.enligne=? AND commande.statut=? ORDER BY commande.id DESC");
$SelData_servie->execute(array(1,2));
if(isset($_GET['com']))
{
    $idd=$_GET['com'];
    $Selpanier=$connexion->prepare("SELECT produit.designation,produit.photo,panier.quantite,panier.prixunitaire,panier.id from produit,panier where panier.produit=produit.id and panier.commande=?");
    $Selpanier->execute(array($idd));
}
    



?>