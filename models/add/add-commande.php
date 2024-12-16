<?php
include("../../connexion/connexion.php");
if (isset($_POST['valider'])){
    $produit=$_GET['idproduit'];
    $prix=$_GET['prix'];
    $quantite=htmlspecialchars( $_POST['qte']);
    $commande=$_SESSION['commande'];

    if(isset($_SESSION['commande']) && $_SESSION['commande']>0 )
    { 
        $req=$connexion->prepare("SELECT quantite from panier where produit=? and commande=?");
        $req->execute(array($produit,$commande));
        if($selQte=$req->fetch())
        {
            $quantite=$quantite+$selQte['quantite'];
            echo $quantite;
            $upd=$connexion->prepare("UPDATE panier SET quantite=? where produit=? AND commande=?");
            $upd->execute(array($quantite,$produit,$commande));
            header('location:../../commande.php');
            
        }
        else{

       
        $req=$connexion->prepare("INSERT into panier(commande,produit,quantite,prixunitaire) values (?,?,?,?)");
        $req->execute(array($commande,$produit,$quantite,$prix));
        echo "panier seulement";
        header('location:../../commande.php');
        }
    }
    else
    {
        $client=$_SESSION['client'];
        $date=date('Y-m-d h:m:s');
       
        echo  $date;
        $req=$connexion->prepare("INSERT into commande(dates,client,enligne) values(?,?,?)");
        $req->execute(array($date,$client,1));
        $reqe=$connexion->prepare("SELECT * FROM commande where dates=? and client=?");
        $reqe->execute(array($date,$client));
        $com=$reqe->fetch();
        $commande=$com['id'];
        $_SESSION['commande']=$commande;
    
        if($req){
            echo"enregistrement...";
            $req=$connexion->prepare("INSERT into panier(commande,produit,quantite,prixunitaire) values (?,?,?,?)");
            $req->execute(array($commande,$produit,$quantite,$prix));
            header('location:../../commande.php');
    
        }
    }
    
}


?>