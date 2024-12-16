<?php 
include('../../connexion/connexion.php');
if(isset($_POST['valider'])){
    $id=$_GET['id'];
    $produit=htmlspecialchars($_POST['produit']);
    $quantite=htmlspecialchars($_POST['qte']);
    $req=$connexion->prepare("UPDATE  stock SET  produit=?,quanite=? where id=?");
    $req->execute(array($produit,$quantite,$id));
    if($req){
        $_SESSION['notif']="Enregistrement reussie";
        header("location:../../views/stock.php?new");
    }
    
   

}
?>