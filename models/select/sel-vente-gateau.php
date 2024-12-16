<?php
if(isset($_GET['mod'])){
    $id=$_GET['mod'];
    $action="../models/update/up-stock.php?id=$id";
    $titre="Modifier commande";
    $bouton="Modifier";
   
    $SelProd=$connexion->prepare("SELECT * from gateau");
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
        $SelProd=$connexion->prepare("SELECT * from gateau where id=?");
        $SelProd->execute(array($idproduit));
    }
    
}
$SelData=$connexion->prepare("SELECT client.nom,client.postnom,client.prenom,client.photo,commande.dates,commande.id from client,commande where client.id=commande.client ORDER BY commande.id DESC");
$SelData->execute();

    



?>