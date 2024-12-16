<?php

if(isset($_GET['mod'])){
    $id=$_GET['mod'];
    $action="../models/update/up-model-gateau.php?id=$id";
    $titre="Modifier un model";
    $bouton="Modifier";
    $req=$connexion->prepare("SELECT * from gateau where id=?");
    $req->execute(array($id));
    $ModData=$req->fetch();
    

}
else{
    $action="../models/add/add-model-gateau.php";
    $bouton="Enregistrer";
    $titre="Ajouter un model ";


}

$SelData=$connexion->prepare("SELECT *  from gateau");
$SelData->execute();

?>