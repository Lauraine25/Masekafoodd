<?php 
include('../../connexion/connexion.php');
if(isset($_POST['valider'])){
    $id=$_GET['id'];
    $designation=htmlspecialchars($_POST['designation']);
    $prix=htmlspecialchars($_POST['prix']);
    $photo=$_FILES['photo']['name'];
    $upload="../../assets/img/produit/".$photo;
    move_uploaded_file($_FILES['photo']['tmp_name'],$upload);
   
    $req=$connexion->prepare("UPDATE  gateau SET  designation=?,prix=?,photo=? where id=?");
    $req->execute(array($designation,$prix,$photo,$id));
    if($req){
        $_SESSION['notif']="Modification  reussie";
        header("location:../../views/model-gateau.php?new");
    }
   

}
?>