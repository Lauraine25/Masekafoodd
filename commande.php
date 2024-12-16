<?php include('connexion/connexion.php');
include('models/select/sel-produit-client.php');

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
          <li><a class="nav-link scrollto" href="#pricing">Articles</a></li>
          <li><a class="nav-link scrollto" href="#cake">Gateaux</a></li>
          <li><a class="nav-link scrollto " href="voircommande.php?all">Mes commandes</a></li>
          <?php if(isset($_SESSION['commande']) && $_SESSION['commande']>0){
            $req=$connexion->prepare("SELECT count(id) as nb from panier  where commande=? ");
            $req->execute(array($_SESSION['commande']));
            $count=$req->fetch();
            
          


            ?>
           <li><a class="nav-link " href="voircommande.php"><i class="bi bi-cart-fill " height=50></i> <span class="badge bg-primary badge-number"><?=$count['nb']?></span></a></li>
           <?php  } ?>
           <?php 
           $date=date('Y-m-d');
           $reqq=$connexion->prepare("SELECT count(id)  as nb from commande_gateau where date_commande=? AND client=? AND statut=0 AND enligne=1");
           $reqq->execute(array($date,$_SESSION['client']));
           $count_gateau=$reqq->fetch();
           if($count_gateau['nb']>0)
           {
           ?>
        <li><a class="nav-link " href="voircommande.php?com_gateau"><i class="bi bi-gift-fill " height=50></i> <span class="badge bg-primary badge-number"><?=$count_gateau['nb']?></span></a></li>
        <?php } ?>
           <li>
            <a href="#"> <img src="assets/img/clients/<?=$_SESSION['photos']?>" width=25 height="25" alt="Profile" class="rounded-circle" class=""><span class=""><?=$_SESSION['nom']?></span></a>
              
              
       
        
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

        <div class="section-title">
          <span>Les articles</span>
          <h2>Les articles</h2>
          <p>Voici Nos produits disponibles dans nos points de vente</p>
        </div>

        <div class="row">

          <?php while($produit=$SelData->fetch()){
             $req=$connexion->prepare("SELECT sum(quanite)  as somme from stock where produit=?");
             $req->execute(array($produit['id']));
             $selstock=$req->fetch();  
             $reqq=$connexion->prepare("SELECT sum(quantite)  as somme from panier where produit=?");
             $reqq->execute(array($produit['id']));
             $selvente=$reqq->fetch(); 
             $stock=$selstock['somme']-$selvente['somme'];
             if($stock>0){
            ?>

          <div class="col-lg-4 col-md-6 p-3 " data-aos="zoom-in" data-aos-delay="150">
            <div class="box">
                <section id="<?php echo $produit['designation']?>" class="<?=$produit['designation']?>"></section>
              <img src="assets/img/produit/<?=$produit['photo']?>" alt="" height=200 >
              <h3><?=$produit['designation']?></h3>
              <h4><?=$produit['prix']?><sup>$</sup><span> </span></h4>
              <label for=""><?=$stock?> disponibles</label>
              <?php if(isset($_GET['idproduit']) && $_GET['idproduit']==$produit['id']){ ?>
                <form action="models/add/add-commande.php?prix=<?=$produit['prix']?>&idproduit=<?=$produit['id']?>" method="POST">
                <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 p-3">
                 
                        <input autocomplete="off" required type="number" min="1" class="form-control" placeholder="quantite" id="qte"  name="qte" max="<?=$stock?>" <?php if(isset($id)){?> value="<?=$ModData['designation']?>"<?php } ?>>   
                    </div>
                    
                        <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 aling-center">
                            <button class="btn btn-danger w-100" type="submit" name="valider"><i class="bi bi-cart-plus-fill"></i> </button>
                        
                        </div>
                </form>
                <?php } else { ?>
               
              
              <div class="btn-wrap">
                <a href="commande.php?idproduit=<?=$produit['id']?>&prix=<?=$produit['prix']?>#<?=$produit['designation']?>" class="btn-buy">Ajouter</a>
              </div>
              <?php  }?>
            </div>
          </div>
          <?php } } ?>
        </div>

      </div>
    </section>

    <section id="cake" class="pricing">
      <div class="container">

        <div class="section-title">
          <span>Gateau</span>
          <h2>Gateau</h2>
          <p>Voici les modèles de gateaux que nous faisons</p>
        </div>

        <div class="row">
           

          <?php while($gateau=$SelGateau->fetch()){
             
            ?>

         <div class="col-lg-4 col-md-6 mt-4 mt-md-0 p-3" data-aos="zoom-in">
            <div class="box">
              <img src="assets/img/produit/<?=$gateau['photo']?>"  height=200 alt="">
              
              <h4><?=$gateau['prix']?><sup> $</sup><span></span></h4>
              <ul>
                <li><?=$gateau['designation']?></li>
              </ul>
              <div class="btn-wrap">
                <a href="gateau.php?idgateau=<?=$gateau['id']?>&prix=<?=$gateau['prix']?>" class="btn-buy">Commander</a>
              </div>
            </div>
          </div>
         
          <?php }  ?>
        </div>

      </div>
    </section>
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