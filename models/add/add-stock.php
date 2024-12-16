<?php 
include('../../connexion/connexion.php');
if(isset($_POST['valider'])){
    $produit=htmlspecialchars($_POST['produit']);
    $quantite=htmlspecialchars($_POST['qte']);
    $date=date('Y-m-d h:m:s');
    $req=$connexion->prepare("INSERT INTO stock (produit,quanite,dates) values  (?,?,?)");
    $req->execute(array($produit,$quantite,$date));
    if($req){
        $_SESSION['notif']="Enregistrement reussie";
        header("location:../../views/stock.php?new");
    }
    

}
?>