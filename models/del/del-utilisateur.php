<?php 
include('../../connexion/connexion.php');
if(isset($_GET['iddel']))
{
    $id=$_GET['iddel'];
    $statut=1;
    $req=$connexion->prepare("UPDATE utilisateur set statut=? where id=?");
    $req->execute(array($statut,$id));
    if($req){
        $_SESSION['notif']="suppression  reussie";
        header("location:../../views/utilisateur.php?new");
    }
}
