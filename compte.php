<?php 
include('connexion/connexion.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Maseka/compte</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.jpg" rel="icon">
  <link href="assets/img/logo.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.jpg" alt="">
                  <span class="d-none d-lg-block">Maseka</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Créer compte</h5>
                    <p class="text-center small"></p>
                  </div>
                  

                  <form class="row g-3 needs-validation" action="models/add/add-client.php?compte" method="POST" enctype="multipart/form-data">
                    <div class="col-12">
                      <label for="nom" class="form-label">Votre nom</label>
                      <input type="text" name="nom" class="form-control" id="nom" required>
                      <div class="invalid-feedback">Entrez votre nom s'il vous plait!</div>
                    </div>
                    <div class="col-12">
                      <label for="postnom" class="form-label">Votre postnom</label>
                      <input type="text" name="postnom" class="form-control" id="postnom" required>
                      <div class="invalid-feedback">Entrez votre postnom s'il vous plait!</div>
                    </div>
                    <div class="col-12">
                      <label for="prenom" class="form-label">Votre prenom</label>
                      <input type="text" name="prenom" class="form-control" id="prenom" required>
                      <div class="invalid-feedback">Entrez votre nom,s'il vous plait!</div>
                    </div>
                    <div class="col-12">
                    <label for="">Genre</span></label>
                    <select name="genre" id="genre" class="form-select">
                       <option value="M">Masculin</option>
                       <option value="F">Feminin</option>
                    </select>
                    </div>
                    <div class="col-12">
                      <label for="telephone" class="form-label">Votre telephone</label>
                      <input type="text" name="telephone" class="form-control" id="telephone" required>
                      <div class="invalid-feedback">Entrez une adresse mail valide,s'il vous plait!</div>
                    </div>

                    <div class="col-12">
                      <label for="photo" class="form-label">Photo</label>
                      <input type="file" name="photo" class="form-control" id="photo" required>
                      <div class="invalid-feedback">Entrez votre mot de passe s'il vous plait!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="valider" type="submit">Creer </button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Avez-vous déjà un compte? <a href="login.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

             

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/assets/vendor/quill/quill.min.js"></script>
  <script src="assets/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/assets/js/main.js"></script>

</body>

</html>