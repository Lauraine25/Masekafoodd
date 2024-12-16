<?php include('connexion/connexion.php');
if(isset($_SESSION['commande']) && !isset($_GET['all'])){
    $idcom=$_SESSION['commande'];
    $client=$_SESSION['client'];
    $voircomm=$connexion->prepare("SELECT panier.*,produit.designation,produit.photo FROM panier,produit,commande where panier.produit=produit.id AND panier.commande=?  AND panier.commande=commande.id AND commande.client=? ORDER BY panier.id; ");
    $voircomm->execute(array($idcom,$client));
}
if(isset($_GET['idcom']) && !isset($_GET['all'])){
    $idcomm=$_GET['idcom'];
    $voircom=$connexion->prepare("SELECT panier.*,produit.designation,produit.photo FROM panier,produit where panier.produit=produit.id AND panier.commande=? ORDER BY panier.id; ");
    $voircom->execute(array($idcomm));
   
}
else
{
    $client=$_SESSION['client'];
    $voircom=$connexion->prepare("SELECT * from commande where client=? and enligne=1  AND statut>0 order by id desc ");
    $voircom->execute(array($client));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Maseka</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="../assets/assets/css/style.css" rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Maseka</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.php">Accueil</a></li>
          <li><a class="nav-link scrollto" href="commande.php">Articles</a></li>
          <li><a class="nav-link scrollto " href="voircommande.php?all">Mes commandes</a></li>
          <?php if(isset($_SESSION['commande']) && $_SESSION['commande']>0){
            $req=$connexion->prepare("SELECT count(id) as nb from panier  where commande=? ");
            $req->execute(array($_SESSION['commande']));
            $count=$req->fetch();
          


            ?>
           <li><a class="nav-link " href="voircommande.php"><i class="bi bi-cart-fill " height=50></i> <span class="badge bg-primary badge-number"><?=$count['nb']?></span></a></li>
           <?php  } ?>
        
           <li>
            <a href="#"> <img src="assets/img/clients/<?=$_SESSION['photos']?>" width=37 height="37" alt="Profile" class="rounded-circle" class=""><span class=""><?=$_SESSION['nom']?></span></a>
              
              
       
        
         </li>
    
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">
        <?php if(isset($_GET['all'])){ ?>
            <div class="section-title">
          <span>commande</span>
        
          <p>Voici mes commandes </p>
        </div>

        <div class="row">
        <div class=" table-responsive">
              <table class="table">
                  <thead>
                    
                      <tr>
                          <th scope="col">N°</th>
                          <th scope="col">date</th>
                          <th scope="col">Total</th>
                          <th scope="col">Action</th>

                      </tr>
                  </thead>
                  <tbody>
                   
                    <?php 
                    $numero=0;
                    $total=0;
                    $totalpanier=0;
                    while($commandes=$voircom->fetch()){
                        $numero++;
                        $com=$commandes['id'];
                        $req=$connexion->prepare("SELECT quantite*prixunitaire as total from panier where commande=?");
                        $req->execute(array($com));
                        $total=0;
                        while($calcul=$req->fetch()){
                         
                          $total=$total+$calcul['total'];
                        }
                       
                    ?>
                    
                    <tr>
                        <td><?=$numero?></td>
                       
                        <td><?php $dates=strtotime($commandes["dates"]); echo date('d-m-Y h:m:s',$dates);?></td>
                        <td><?=$total?>$</td>
                        <td>                          
                             <a href="?idcom=<?=$commandes['id']?>&date=<?=$commandes['dates']?>" class="btn btn-warning btn-sm ">Details</a>
                            
                    </tr> 

                    <?php } ?>   
                       
                  </tbody>
              </table>
            </div>

          
        </div>
        <?php } else if(isset($_GET['idcom'])){ ?>   
        <div class="section-title">
          <span>commande</span>
        
          <p>Detail de la commande du  <?php $dates=strtotime($_GET["date"]); echo date('d-m-Y h:m:s',$dates);?></p>
        </div>

        <div class="row">
        <div class=" table-responsive">
              <table class="table">
                  <thead>
                    
                      <tr>
                          <th scope="col">N°</th>
                          <th scope="col">produit</th>
                          <th scope="col">quantite</th>
                          <th scope="col">total</th>
                          <!-- <th scope="col">Action</th> -->

                      </tr>
                  </thead>
                  <tbody>
                   
                    <?php 
                    $numero=0;
                    $total=0;
                    $totalpanier=0;
                    while($commandes=$voircom->fetch()){
                        $numero++;
                        $totalpanier=$commandes['quantite']*$commandes['prixunitaire'];
                        $total=$total+$totalpanier;
                    ?>
                    
                    <tr>
                        <td><?=$numero?></td>
                        <!-- <td scope="row"><a href="../assets/img/produit/<?=$commandes['photo']?>"><img src="../assets/img/clients/<?=$commandes['photo']?>" alt="" width=40></a></td> -->
                       
                        <td><?=$commandes['designation']." ".$commandes['prixunitaire']?> $/piece</td>
                        <td><?php if(isset($_GET['id']) && $commandes['id']==$_GET['id']){ ?><form id="quantite<?=$commandes['id']?>" action="models/update/up-panier-client.php?idproduit=<?=$commandes['produit']?> "method="POST"><input type="number" name="quantite" id="quantite" value="<?=$commandes['quantite']?>"><input type="submit"class="btn btn-danger" name="uppanier"value="Modifier"></form><?php }else{?><?=$commandes['quantite'];}?></td>
                        <td><?=$commandes['quantite']*$commandes['prixunitaire']?>$</td>
                        <!-- <td>                          
                             <a href="?id=<?=$commandes['id']?>#quantite<?=$commandes['id']?>" class="btn btn-warning btn-sm "><i
                             class="bi bi-pencil"></i></a>
                              <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"
                             href="models/del/del-commande.php?iddelpanier=<?=$commandes['id'] ?>"
                              class="btn btn-danger btn-sm "><i class="bi bi-trash3-fill"></i></a>
                         </td> -->
                    </tr> 

                    <?php } ?>   
                    <tr>
                    
                        <td colspan="3">TOTAL</td>
                        <td><?=$total?>$</td>
                        <td></td>

                    </tr>     
                  </tbody>
              </table>
            </div>

          
        </div>
        <?php } else if(isset($_GET['com_gateau'])){ ?>  
        <div class="section-title">
          <span>commande</span>
        
          <p>Voici la commande du jour de gateau </p>
        </div>

        <div class="row">
           <div class=" table-responsive">
              <table class="table">
                  <thead>
                    
                      <tr>
                          <th scope="col">N°</th>
                          <th scope="col">Gateau</th>
                          <th scope="col">Details</th>
                          <th scope="col">Prix</th>
                          <th scope="col">Action</th>

                      </tr>
                  </thead>
                  <tbody>
                   
                    <?php 
                     $date=date('Y-m-d');
                     $req_gateau=$connexion->prepare("SELECT commande_gateau.*,gateau.photo,gateau.designation from gateau,commande_gateau where commande_gateau.modele=gateau.id AND commande_gateau.enligne=1 ANd commande_gateau.statut=0 AND commande_gateau.date_commande=? AND commande_gateau.client=? ");
                     $req_gateau->execute(array($date,$_SESSION['client']));
                     $numero=0;
                     while($com_gateau=$req_gateau->fetch()){
                      $numero++;
                  
                   

                    ?>
                    
                    <tr>
                        <td><?=$numero?></td>
                        <td><a href="assets/img/produit/<?=$com_gateau['photo']?>"><img src="assets/img/clients/<?=$com_gateau['photo']?>" alt="" width=40></a><?=$com_gateau['designation']." ".$com_gateau['prix']?> $</td>
                        <td><?php if(isset($_GET['id']) && $com_gateau['id']==$_GET['id']){ ?>
                          <form id="information<?=$com_gateau['id']?>" action="models/update/up-panier-client.php?com_gateau=<?=$com_gateau['id']?> "method="POST">
                            <input type="text" required name="information" id="information" value="<?=$com_gateau['information']?>">
                            <button  class="btn btn-danger" type="submit" name="up_gateau"><i
                          class="bi bi-check2"></i></button>
                          <a href="voircommande.php?com_gateau" class="btn btn-dark"><i class="bi bi-file-earmark-excel-fill"></i></a></form><?php }else{?><?=$com_gateau['information'];}?></td>
                        <td><?=$com_gateau['prix']?>$</td>
                        <td>                          
                             <a href="?com_gateau&id=<?=$com_gateau['id']?>" class="btn btn-warning btn-sm "><i
                             class="bi bi-pencil"></i></a>
                              <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"
                             href="models/del/del-commande.php?iddelpanier=<?=$com_gateau['id'] ?>"
                              class="btn btn-danger btn-sm "><i class="bi bi-trash3-fill"></i></a>
                              <a onclick=" return confirm('Voulez-vous vraiment valider cette commande ?')"
                             href="models/traitement_com_online.php?confirm_com_gateau=<?=$com_gateau['id'] ?>"
                              class="btn btn-success btn-sm "><i class="bi bi-check2"></i></a>
                        </td>
                    </tr> 
                    

                    <?php } ?>  
                    
                  </tbody>
              </table>
            </div>

          
        </div>
        <?php }else{ ?>  
        <div class="section-title">
          <span>commande</span>
        
          <p>Voici la commande du jour </p>
        </div>

        <div class="row">
           <div class=" table-responsive">
              <table class="table">
                  <thead>
                    
                      <tr>
                          <th scope="col">N°</th>
                          <th scope="col">produit</th>
                          <th scope="col">quantite</th>
                          <th scope="col">total</th>
                          <th scope="col">Action</th>

                      </tr>
                  </thead>
                  <tbody>
                   
                    <?php 
                    $numero=0;
                    $total=0;
                    $totalpanier=0;
                    while($commandes=$voircomm->fetch()){
                        $numero++;
                        $totalpanier=$commandes['quantite']*$commandes['prixunitaire'];
                        $total=$total+$totalpanier;

                        $req=$connexion->prepare("SELECT sum(quanite)  as somme from stock where produit=?");
                        $req->execute(array($commandes['produit']));
                        $selstock=$req->fetch();  
                        $reqq=$connexion->prepare("SELECT sum(quantite)  as somme from panier where produit=?");
                        $reqq->execute(array($commandes['produit']));
                        $selvente=$reqq->fetch(); 
                        $stock=$selstock['somme']-$selvente['somme'];
                        $stock=$stock+$commandes['quantite'];
                   

                    ?>
                    
                    <tr>
                        <td><?=$numero?></td>
                        <td><a href="assets/img/produit/<?=$commandes['photo']?>"><img src="assets/img/clients/<?=$commandes['photo']?>" alt="" width=40></a><?=$commandes['designation']." ".$commandes['prixunitaire']?> $/piece</td>
                        <td><?php if(isset($_GET['id']) && $commandes['id']==$_GET['id']){ ?><form id="quantite<?=$commandes['id']?>" action="models/update/up-panier-client.php?idproduit=<?=$commandes['produit']?> "method="POST"><input type="number" name="quantite" min="1" id="quantite"max=<?=$stock?> value="<?=$commandes['quantite']?>"><input type="submit"class="btn btn-danger" name="uppanier"value="Modifier"></form><?php }else{?><?=$commandes['quantite'];}?></td>
                        <td><?=$commandes['quantite']*$commandes['prixunitaire']?>$</td>
                        <td>                          
                             <a href="?id=<?=$commandes['id']?>#quantite<?=$commandes['id']?>" class="btn btn-warning btn-sm "><i
                             class="bi bi-pencil"></i></a>
                              <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"
                             href="models/del/del-commande.php?iddelpanier=<?=$commandes['id'] ?>"
                              class="btn btn-danger btn-sm "><i class="bi bi-trash3-fill"></i></a>
                         </td>
                    </tr> 
                    

                    <?php } ?>  
                   
                  
                    <tr>
                        <td><a class="btn btn-danger" href="models/del/del-commande.php?iddelcom=<?=$_SESSION['commande']?>">annuler la commande</a></td>
                        <td><a class="btn btn-dark" href="models/traitement_com_online.php?confirm_com=<?=$_SESSION['commande']?>">confirmer la commande</a></td>
                        <td>TOTAL</td>
                        <td><?=$total?>$</td>
                        <td></td>

                    </tr>     
                  </tbody>
              </table>
            </div>

          
        </div>
        <?php } ?>

      </div>
    </section><!-- End Pricing Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
 

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Maseka</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
 
        Designed by <a href="">Lauraine Kiro</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>