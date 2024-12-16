<?php

if(isset($_GET['mod'])){
    $id=$_GET['mod'];
    $action="../models/update/up-stock.php?id=$id";
    $titre="Modifier stock";
    $bouton="Modifier";
    $req=$connexion->prepare("SELECT * from stock where id=?");
    $req->execute(array($id));
    $ModData=$req->fetch();
    $SelProd=$connexion->prepare("SELECT * from produit");
    $SelProd->execute();

}
else{
    $action="../models/add/add-stock.php";
    $bouton="Enregistrer";
    $titre="Ajouter stock";
    $SelProd=$connexion->prepare("SELECT * from produit");
    $SelProd->execute();

}

$SelData=$connexion->prepare("SELECT stock.*,produit.designation,produit.photo from stock,produit where stock.produit=produit.id");
$SelData->execute();

?>