<?php include("../../connexion/connexion.php");

if (isset($_POST["valider"])) {
    
    $nom=htmlspecialchars($_POST['nom']);
    $postnom=htmlspecialchars($_POST['postnom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $genre=htmlspecialchars($_POST['genre']);
    $telephone=htmlspecialchars($_POST['telephone']);
    $photo=$_FILES['photo']['name'];
    $upload="../../assets/img/clients/".$photo;
    move_uploaded_file($_FILES['photo']['tmp_name'],$upload);
    $username="$nom$postnom@maseka.com";
    $motdepasse=strtolower(substr($postnom,1,1)).strtoupper(substr($nom,2,1)).substr($telephone,5,2).strtolower(substr($nom,1,1)).substr($telephone,1,3).$genre.strtolower(substr($prenom,1,1));
    $req=$connexion->prepare("INSERT INTO client(nom,postnom,prenom,genre,telephone,photo,username,motdepasse) VALUES (?,?,?,?,?,?,?,?)");
    $req->execute(array($nom,$postnom,$prenom,$genre,$telephone,$photo,$username,$motdepasse));
    if($req){
        if(isset($_GET['compte']))
        {
            $_SESSION['notif']="Compte creer avec succes, utiliser  comme </br> username: $username </br> mot de passe: $motdepasse ";
            header('location:../../login.php?fonction=client');
        }
        else
        {
            $_SESSION['notif']="Enregistrement reussie";
            header('location:../../views/client.php?new');
        }
    }

    
}
 ?>