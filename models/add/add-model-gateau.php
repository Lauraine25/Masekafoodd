<?php 
include('../../connexion/connexion.php');
if(isset($_POST['valider'])){
  
    $designation=htmlspecialchars($_POST['designation']);
    $prix=htmlspecialchars($_POST['prix']);
    $photo=$_FILES['photo']['name'];
    $upload="../../assets/img/produit/".$photo;
    move_uploaded_file($_FILES['photo']['tmp_name'],$upload);
    
    $req=$connexion->prepare("INSERT INTO gateau (designation,prix,photo) values  (?,?,?)");
    $req->execute(array($designation,$prix,$photo));
    if($req){
        $_SESSION['notif']="Enregistrement reussie";
        header("location:../../views/model-gateau.php?new");
    }
    echo $_SESSION['notif'];

}
?>