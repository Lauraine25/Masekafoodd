<?php include("../../connexion/connexion.php");

if (isset($_POST["valider"])) {
    $id=$_GET['id'];
    $nom=htmlspecialchars($_POST['nom']);
    $postnom=htmlspecialchars($_POST['postnom']);
    $genre=htmlspecialchars($_POST['genre']);
    $telephone=htmlspecialchars($_POST['telephone']);
    $fonction=htmlspecialchars($_POST['fonction']);
    $photo=$_FILES['photo']['name'];
    $upload="../../assets/img/utilisateur/".$photo;
    move_uploaded_file($_FILES['photo']['tmp_name'],$upload);
    $username="$nom$postnom@maseka.com";
    $motdepasse=strtolower(substr($postnom,1,1)).strtoupper(substr($nom,2,1)).substr($telephone,5,2).strtolower(substr($nom,1,1)).substr($telephone,1,3).$genre;
    $req=$connexion->prepare("UPDATE  utilisateur SET nom=?,postnom=?,genre=?,telephone=?,fonction=?,photo=?,username=?,password=? where id=?");
    $req->execute(array($nom,$postnom,$genre,$telephone,$fonction,$photo,$username,$motdepasse,$id));
    if($req){
        $_SESSION['notif']="Modification reussie";
        header('location:../../views/utilisateur.php?new');
    }

    
}
 ?>