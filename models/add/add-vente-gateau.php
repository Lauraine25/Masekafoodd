<?php
include("../../connexion/connexion.php");

if (isset($_POST['valider'])){
    $produit=htmlspecialchars($_POST['produit']);
    $req=$connexion->prepare("SELECT prix  from produit where id=?");
    $req->execute(array($produit));
    $selPrix=$req->fetch();
    $prix=$selPrix['prix'];
    $information=htmlspecialchars($_POST['information']);
    $date=htmlspecialchars($_POST['datelivraison']);
    $datecommande=date('Y-m-d h:m:s');
    $req=$connexion->prepare("INSERT into commande_gateau(client,modele,prix,information,date_commande,date_livraison) values(?,?,?,?,?,?)");
    $req->execute(array($client,$modele,$prix,$information,$datecommande,$date));
    if($req)
    {
        $_SESSION['notif']="Enregistrement reussi";
        header("location:../../views/vendre_gateau.php?new");
    }

    
    
}


?>