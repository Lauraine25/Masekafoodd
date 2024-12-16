<?php 
include('../../connexion/connexion.php');
if(isset($_POST['valider'])){
    $id=$_GET['id'];
    $categorie=htmlspecialchars($_POST['categorie']);
    $designation=htmlspecialchars($_POST['designation']);
    $prix=htmlspecialchars($_POST['prix']);
    $photo=$_FILES['photo']['name'];
    $upload="../../assets/img/produit/".$photo;
    move_uploaded_file($_FILES['photo']['tmp_name'],$upload);
   
    $req=$connexion->prepare("UPDATE  produit SET  designation=?,categorie=?,prix=?,photo=? where id=?");
    $req->execute(array($designation,$categorie,$prix,$photo,$id));
    if($req){
        $_SESSION['notif']="Modification  reussie";
        header("location:../../views/produit.php?new");
    }
   

}
?>