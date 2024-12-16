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
          <li><a class="nav-link scrollto active" href="#hero">Accueil</a></li>
          <li><a class="nav-link scrollto" href="#about">A propos</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Articles</a></li>
          <li><a class="nav-link scrollto" href="#team">Employés</a></li>
          <li class="dropdown"><a href="#"><span>Se connecter</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="login.php?fonction=employer">Employé</a></li>
              <li><a href="login.php?fonction=client">Client</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
      <h1>Welcome to Maseka</h1>
      <h2>Bienvenue sur la page de MASEKA</h2>
      <a <?php if(isset($_SESSION['client']) && $_SESSION['client']>0 ){ ?>href="commande.php?idproduit=<?=$produit['id']?>#<?=$produit['designation']?>"<?php } else{ ?> href="login.php?fonction=client"<?php } ?> class="btn-get-started scrollto">commander </a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
            <img src="assets/img/logo.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3>A propos de la boulangerie Maseka</h3>
            <p class="fst-italic">
              
            Située au cœur de Bulengera, notre boulangerie est un véritable paradis pour les amateurs de pain frais et de pâtisseries délicieuses. Chez nous, la passion pour la boulangerie se mélange à l’arôme envoûtant du pain tout juste sorti du four.
            </p>
            <H3>Notre engagement</H3>
            <ul>
              <li><i class="bi bi-check-circle"></i>Qualité supérieure : Nous utilisons uniquement des ingrédients de première qualité pour garantir la fraîcheur et le goût exceptionnel de nos produits.</li>
              <li><i class="bi bi-check-circle"></i>Variété gourmande : Du pain traditionnel aux viennoiseries, en passant par les gâteaux et les tartes, notre assortiment saura satisfaire toutes les envies.</li>
              <li><i class="bi bi-check-circle"></i>Service chaleureux : Notre équipe souriante est là pour vous accueillir et vous conseiller avec passion.
              Venez nous rendre visite et découvrez le bonheur de savourer un croissant croustillant, une baguette dorée ou un éclair fondant. La Boulangerie Maseka, où chaque bouchée est une douceur pour l’âme.</li>
            </ul>
            
            

          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <span>Services</span>
          <h2>Services</h2>
          <p>Voici nos différents services</p>
        </div>

        <div class="row">
         

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="450">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-basket"></i></div>
              <h4><a href="">Gateau</a></h4>
              <p>Commandez des gateaux pour vos differentes manifestations</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="600">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-slideshow"></i></div>
              <h4><a href="">Service traiteur</a></h4>
              <p>Commandez vos patisseries;pains,beignets,jus en ligne</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="750">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-arch"></i></div>
              <h4><a href="">Restaurant</a></h4>
              <p>Reservez une table, vous pouvez aussi choisir le menu</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="750">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-arch"></i></div>
              <h4><a href="">Pizzeria</a></h4>
              <p>Commandez une pizza à tous les formats que vous souhaitez</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

 

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <span>Les articles</span>
          <h2>Les articles</h2>
          <p>Voici Nos produits disponibles dans nos points de vente</p>
        </div>

        <div class="row">

          <?php while($produit=$SelData->fetch()){?>
          <div class="col-lg-4 col-md-6 p-3 " data-aos="zoom-in" data-aos-delay="150">
            <div class="box">
              <img src="assets/img/produit/<?=$produit['photo']?>" alt="" height=200 >
              <h3><?=$produit['designation']?></h3>
              <h4><?=$produit['prix']?><sup>$</sup><span> </span></h4>
              <h4></h4>
              <!-- <ul>
                <li>Aida dere</li>
               
              </ul> -->
              <div class="btn-wrap">
                <a <?php if(isset($_SESSION['client']) && $_SESSION['client']>0 ){ ?>href="commande.php?idproduit=<?=$produit['id']?>#<?=$produit['designation']?>"<?php } else{ ?> href="login.php?fonction=client"<?php } ?> class="btn-buy">Commander</a>
              </div>
            </div>
          </div>
          <?php } ?>
          <!-- <div class="col-lg-4 col-md-6 mt-4 mt-md-0 p-3" data-aos="zoom-in">
            <div class="box featured">
              <img src="assets/img/f3.png" alt="">
              <h3>Pizza</h3>
              <h4>19<sup> $</sup><span></span></h4>
              <ul>
                <li>Aida dere</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Acheter</a>
              </div>
            </div>
          </div> -->



        </div>

      </div>
        <div class="text-center">
             <a href="https://docs.google.com/forms/d/e/1FAIpQLSeGkgk-TS_sX7RVJK4Nsb1euBG16fW0xbGRKaaFPPLpoCkvZQ/viewform?usp=header" class="btn btn-dark">Avis clients</a>
          </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
 
<?php 
include_once("footer.php");

?>
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