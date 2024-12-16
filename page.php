<!-- <?php 
include_once('../connexion/connexion.php')
?> -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>maseka</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- link -->
    <?php 
    include_once('include/link.php');
    
    ?>
  <!-- link -->
  
<!-- menu -->
<?php 
include_once('menu.php');
?>

</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>


  <main id="main" class="main">

        <div class="pagetitle">
            <nav>
                
            </nav>
           
    
        </div><!-- End Page Title -->
        <div>
           
        </div>
        <div class="container">
          <section class="section" id="entrees" >
              <div class="row">
                  <div class="col-lg-12">

                      <div class="card">
                          <div class="card-body">
                              <h5 class="card-title text-center "> Entrées en Stock</h5>
                                                      
                              <!-- Table with stripped rows -->
                              <?php if(isset($_GET['new'])){ ?>
                                  <form  class="shadow p-3"action="" method="POST">
                                  <div class="row">
                                  <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                      <label for="">Choisir l'article</label>
                                                  <select class="form-select" id="floatingSelect" aria-label="State" name="article" >
                                                      <!-- <?php 

                                                      $repArt= $connexion-> query("SELECT * FROM `article` WHERE statut=0");
                                                      while ($tab=$repArt->fetch()) {
                                                          
                                                      ?>                    
                                                          <option value="<?php echo $tab['id']; ?>">
                                                              <?php echo $tab['designation']; ?>
                                                                                                                          
                                                          </option>
                                                      <?php 
                                                      }
                                                      ?>                     -->
                                                  </select>
                                      </div>
                                    
                                      <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                          <label for="">Quantité </span></label>
                                          <input autocomplete="off" required type="number" class="form-control" placeholder="Entrez la quantite"  name="qte" <?php if(isset($id)){?> value="<?=$ent['quantite']?>"<?php } ?>>
                                          
                                          
                                      </div>
                                    
                                      <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                          <label for="">Prix </label>
                                          <input autocomplete="off" required type="number" class="form-control" placeholder="Entrez le Prix" name="prix"  <?php if(isset($id)){?> value="<?=$ent['prix']?>"<?php } ?>> 

                                      </div>
                                      <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                      <label for="">Choisir le planteur</label>
                                          <select class="form-select" id="floatingSelect" aria-label="State" name="fournisseur" >
                                                          <!-- <?php 

                                                          $repChat= $connexion-> query("SELECT * FROM `planteur`");
                                                          while ($tab=$repChat->fetch()) {
                                                          
                                                          ?>                    
                                                          <option value="<?php echo $tab['idplan']; ?>">
                                                              <?php echo $tab['nom']; ?>
                                                              <?php echo $tab['postnom']; ?>                                                            
                                                              <?php echo $tab['telephone']; ?>                                                            
                                                              </option>
                                                          <?php 
                                                      }
                                                      ?>                     -->
                                            </select>
                                          </div>
                        
                                      </div>
                                    
                          <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">
                            <input type="submit" class="btn btn-dark w-100" name="valider" value="enregistrer">
                          </div>
                      </div>
                
                
                                  </form>

                              <?php }else{ ?>
                                  <a href="page.php?new" class=" btn btn-outline-primary bi bi-plus">Nouveau stock</a> 

                              <?php }?>
                              <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">N°</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Planteur</th>
                                            <th scope="col">Prix Unitaire</th>
                                            <th scope="col">Quantité</th>
                                            <th scope="col">Prix Total</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!-- <?php 
                                            $site=1;
                                            $req=$connexion->prepare("SELECT entree.date, article.designation, entree.quantite, planteur.nom, planteur.postnom,entree.id FROM `entree`,article,planteur WHERE article.id=entree.article AND planteur.idplan=entree.planteur AND entree.utilisateur='$site'");
                                            $req->execute();
                                            $number=0;

                                            while($donnee=$req->fetch()){
                                                $number++;

                                            ?>

                                            <tr>
                                                <th scope="row"><?php echo $number; ?></th>
                                                <td><?php echo $donnee['0']; ?></td>
                                                <td><?php echo $donnee['1']; ?></td>
                                                <td><?php echo $donnee['2']; ?></td>
                                                <td>
                                                    <?php echo $donnee['3']; ?>
                                                    <?php echo $donnee['4']; ?>
                                                </td>
                                              
                                            </tr>
                                            <?php 
                                            }
                                        ?> -->
                                        
                                    </tbody>
                                </table>
                              </div>
                              <!-- End Table with stripped rows -->

                          </div>
                      </div>

                  </div>
              </div>
          </section>
        </div>

     

       

    </main><!-- End #main -->
  

  <!-- ======= Footer ======= -->
  <?php include('include/footer'); ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php 
    include_once('include/script.php');
    
    ?>

  <!-- Template Main JS File -->


</body>

</html>