<?php
if(isset($_GET['mod'])){
    $id=$_GET['mod'];
    $action="../models/update/up-stock.php?id=$id";
    $titre="Modifier commande";
    $bouton="Modifier";
    $req=$connexion->prepare("SELECT * from stock where id=?");
    $req->execute(array($id));
    $ModData=$req->fetch();
    $SelProd=$connexion->prepare("SELECT * from produit");
    $SelProd->execute();
    $SelClient=$connexion->prepare("SELECT * from client");
    $SelClient->execute();

}
else{
    
    $bouton="Enregistrer";
    $titre="Ajouter commande";
    $SelClient=$connexion->prepare("SELECT * from client");
    $SelClient->execute();
    if(isset($_GET['produit']))
    {
        $idproduit=$_GET['produit'];
        $SelProd=$connexion->prepare("SELECT * from produit where id=?");
        $SelProd->execute(array($idproduit));
    }
    
}
$SelData=$connexion->prepare("SELECT client.nom,client.postnom,client.prenom,client.photo,commande.dates,commande.id from client,commande where client.id=commande.client ORDER BY commande.id DESC");
$SelData->execute();
if(isset($_GET['com']))
{
    $idd=$_GET['com'];
    $Selpanier=$connexion->prepare("SELECT produit.designation,produit.photo,panier.quantite,panier.prixunitaire,panier.id from produit,panier where panier.produit=produit.id and panier.commande=?");
    $Selpanier->execute(array($idd));
}
    



?>