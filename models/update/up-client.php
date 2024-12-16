<?php include("../../connexion/connexion.php");

if (isset($_POST["valider"])) {
    $id=$_GET['id'];
    $nom=htmlspecialchars($_POST['nom']);
    $postnom=htmlspecialchars($_POST['postnom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $genre=htmlspecialchars($_POST['genre']);
    $telephone=htmlspecialchars($_POST['telephone']);
    $photo=$_FILES['photo']['name'];
    $upload="../../assets/img/clients/".$photo;
    move_uploaded_file($_FILES['photo']['tmp_name'],$upload);
    $username="$nom$postnom@maseka.com";
    $motdepasse=substr($postnom,1,1).strtoupper(substr($nom,2,1)).substr($telephone,5,2).strtoupper(substr($nom,1,1)).substr($telephone,1,3).$genre.strtoupper(substr($prenom,1,1));
    $req=$connexion->prepare("UPDATE  client SET nom=?,postnom=?,prenom=?,genre=?,telephone=?,photo=?,username=?,motdepasse=? where id=?");
    $req->execute(array($nom,$postnom,$prenom,$genre,$telephone,$photo,$username,$motdepasse,$id));
    if($req){
        $_SESSION['notif']="Modification reussie";
        header('location:../../views/client.php?new');
    }

    
}
 ?>