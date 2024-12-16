<?php

if(isset($_GET['mod'])){
    $id=$_GET['mod'];
    $action="../models/update/up-categorie.php?id=$id";
    $titre="Modifier categorie";
    $bouton="Modifier";
    $req=$connexion->prepare("SELECT * from categorie where id=?");
    $req->execute(array($id));
    $ModData=$req->fetch();

}
else{
    $action="../models/add/add-categorie.php";
    $bouton="Enregistrer";
    $titre="Ajouter categorie";

}

$SelData=$connexion->prepare("SELECT *  from categorie");
$SelData->execute();

?>