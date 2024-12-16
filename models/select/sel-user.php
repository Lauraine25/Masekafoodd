<?php

if(isset($_GET['mod'])){
    $id=$_GET['mod'];
    $action="../models/update/up-utilisateur.php?id=$id";
    $titre="Modifier Produit";
    $bouton="Modifier";
    $req=$connexion->prepare("SELECT * from utilisateur where id=?");
    $req->execute(array($id));
    $ModData=$req->fetch();
  
}
else{
    $action="../models/add/add-utilisateur.php";
    $bouton="Enregistrer";
    $titre="Ajouter utilisateur";


}

$SelData=$connexion->prepare("SELECT *  from utilisateur where statut=0");
$SelData->execute();

?>