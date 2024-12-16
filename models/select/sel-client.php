<?php

if(isset($_GET['mod'])){
    $id=$_GET['mod'];
    $action="../models/update/up-client.php?id=$id";
    $titre="Modifier Produit";
    $bouton="Modifier";
    $req=$connexion->prepare("SELECT * from client where id=?");
    $req->execute(array($id));
    $ModData=$req->fetch();
    $SelCat=$connexion->prepare("SELECT * from categorie");
    $SelCat->execute();

}
else{
    $action="../models/add/add-client.php";
    $bouton="Enregistrer";
    $titre="Ajouter client";


}

$SelData=$connexion->prepare("SELECT *  from client");
$SelData->execute();

?>