<?php 
include('../../connexion/connexion.php');
if(isset($_POST['valider'])){
    $designation=htmlspecialchars($_POST['designation']);
    echo $designation;
    $nom="Laur";
    $laur;
    $req=$connexion->prepare("INSERT INTO categorie (designation) values  (?)");
    $req->execute(array($designation));
    if($req){
        $_SESSION['notif']="Enregistrement reussi";
        header("location:../../views/categorie.php?new");
    }
    

}
?>