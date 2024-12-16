<?php
include('../connexion/connexion.php');
if(isset($_POST['login']) && !empty($_GET['fonction']))
{
    $fonction=$_GET['fonction'];
    if($fonction=="client")
    {
        $username=htmlspecialchars($_POST['username']);
        $password=htmlspecialchars($_POST['password']);
        $req=$connexion->prepare("SELECT * from  client where username=? and motdepasse=?");
        $req->execute(array($username,$password));
        if($data=$req->fetch())
        {
            $_SESSION['client']=$data['id'];
            $_SESSION['nom']=$data['prenom'];
            $_SESSION['photos']=$data['photo'];
            $_SESSION['commande']=0;
            header('location:../commande.php');  
        }
        else{
            $_SESSION['notif']="username ou password incorect";
            header('location:../login.php?fonction=client');  
        }
    }
    else
    {
        $username=htmlspecialchars($_POST['username']);
        $password=htmlspecialchars($_POST['password']);
        $req=$connexion->prepare("SELECT * from  utilisateur where username=? and password=?");
        $req->execute(array($username,$password));
        if($data=$req->fetch())
        {
            $_SESSION['user']=$data['id'];
            $_SESSION['noms']=$data['nom'];
            $_SESSION['fonction']=$data['fonction'];
            $_SESSION['photo']=$data['photo'];
            header('location:../views/admin.php');  
        }
        else{
            $_SESSION['notif']="username ou password incorect";
            header('location:../login.php?fonction=vendeur');  
        }
    }

}

?>