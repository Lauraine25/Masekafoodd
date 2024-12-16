<?php include('connexion/connexion.php');
$id=$_GET['idgateau'];
$req=$connexion->prepare("SELECT * from gateau where id=?");
$req->execute(array($id));
$gateau=$req->fetch();


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
          <li><a class="nav-link scrollto" href="gateau.php">Gateau</a></li>
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

        <div class="section-title">
          <span>Gateau</span>
          <h2>Gateau</h2>
          <p></p>
        </div>

        <div class="box">

        <div class="row">

           <div class="col-lg-6 col-md-6 mt-6 mt-md-0 p-3" data-aos="zoom-in">
            <div class="">
              <img src="assets/img/produit/<?=$gateau['photo']?>"  height=200 alt="">
              
              <h4><?=$gateau['prix']?><sup> $</sup><span></span></h4>
              <ul>
                <li><?=$gateau['designation']?></li>
              </ul>
             
            </div>
          </div>
          <div class="col-lg-6 col-md-6 mt-6 mt-md-0 p-3" data-aos="zoom-in">
            <div class="box featured">
              <h3>information qui sera sur le gateau</h3>
              <form  class="shadow p-3"action="models/add/add-commande-gateau.php?idgateau=<?=$_GET['idgateau']?>&prix=<?=$_GET['prix']?>" method="POST">
               <div class="row">
              
                
                 
                  <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 p-3">
                      <label for=""></span></label>
                      
                      <input autocomplete="off" required type="text" class="form-control" placeholder="Nom: kambale avec un dessin du clavierr " id="information"  name="information">   
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 p-3">
                      <label for="">Date de livraison</span></label>
                      <input autocomplete="off" required type="datetime-local" class="form-control"  id="datelivraison"  name="datelivraison">   
                  </div>
                
                    <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">
                        <input type="submit" name="valider" class="btn btn-buy  " value="Commander">
                  
                    </div>
                </div>


              </form>
              
              <div class="btn-wrap">
                
              </div>
            </div>
          </div>
        </div>
         
        
        </div>
    
        </div>

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