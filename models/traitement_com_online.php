<?php
include('../connexion/connexion.php');
if(isset($_GET['idcom']))
{
    $id=$_GET['idcom'];
    $req=$connexion->prepare("UPDATE commande set statut=? where id=?");
    $req->execute(array(2,$id));
    $_SESSION['notif']="une commande a ete acceptée ";
    header("location:../views/commande_en_ligne.php");

}
if(isset($_GET['confirm_com']))
{
    $id=$_GET['confirm_com'];
    $req=$connexion->prepare("UPDATE commande set statut=? where id=?");
    $req->execute(array(1,$id));
      unset($_SESSION['commande']);
    header('location:../commande.php?');
  

}
if(isset($_GET['confirm_com_gateau']))
{
    $id=$_GET['confirm_com_gateau'];
    $req=$connexion->prepare("UPDATE commande_gateau set statut=? where id=?");
    $req->execute(array(1,$id));
    
    header('location:../commande.php?');
}
?>