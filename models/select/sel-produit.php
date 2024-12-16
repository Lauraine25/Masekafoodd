<?php

if(isset($_GET['mod'])){
    $id=$_GET['mod'];
    $action="../models/update/up-produit.php?id=$id";
    $titre="Modifier Produit";
    $bouton="Modifier";
    $req=$connexion->prepare("SELECT * from produit where id=?");
    $req->execute(array($id));
    $ModData=$req->fetch();
    $SelCat=$connexion->prepare("SELECT * from categorie");
    $SelCat->execute();

}
else{
    $action="../models/add/add-produit.php";
    $bouton="Enregistrer";
    $titre="Ajouter produit";
    $SelCat=$connexion->prepare("SELECT * from categorie");
    $SelCat->execute();

}

$SelData=$connexion->prepare("SELECT *  from produit");
$SelData->execute();

?>