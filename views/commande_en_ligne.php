<?php 
include('../connexion/connexion.php');
include('../models/select/sel-online.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Maseka</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php include('../include/link.php'); ?>


</head>

<body>

  <!-- ======= Header ======= -->
   <?php include('../include/header.php')?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
   
<?php include('../include/menu.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Commande en ligne</h1>
      
    </div><!-- End Page Title -->

    <section class="section dashboard">
      
      <div class="row">
      <div class="col-lg-12">

<div class="card">
    <div class="card-body">
       
        <?php if(isset($_SESSION['notif'])){ ?>
                 <center><p class="alert-dark alert">
                <i class="bi bi-check-circle me-1"><?php echo $_SESSION['notif']; unset($_SESSION['notif']);?></i>
                                                   
            </p></center>
        <?php } ?>
                                
        <h5 class="card-title ">Nouvelles commandes</h5>
          <?php if(isset($_GET['com'])){?>
          <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12">
            <div class=" table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">N°</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Description</th>
                          <th scope="col">Qte</th>
                          <th scope="col">P.U</th>
                          <th scope="col">P.T</th>
                         

                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $numero=0;
                    $total=0;
                    while($data=$Selpanier->fetch()){
                        $numero++;
                        $PT=$data['prixunitaire']*$data['quantite'];
                        $total=$total+$PT;
                    ?>
                    <tr>
                        <td><?=$numero?></td>
                        <th scope="row"><a href="../assets/img/produit/<?=$data['photo']?>"><img src="../assets/img/produit/<?=$data['photo']?>" alt="" width=40></a></th>
                        <td><?=$data['designation']?></td>
                        <td><?=$data['quantite']?></td>
                        <td><?=$data['prixunitaire']?>$</td>
                        <td><?=$PT?>$</td>
                       
                    </tr> 
                    <?php } ?> 
                    <tr>
                      <td colspan='5'>TOTAL</td>
                      <td><?=$total?>$</td>
                    </tr>       
                  </tbody>
              </table>
            </div>
          </div>
          <?php }else { ?>
            <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12">
            <div class=" table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">N°</th>
                          <th scope="col">Client</th>
                          <th scope="col">Date</th>
                          <th scope="col">Montant</th>
                          <th scope="col">Action</th>

                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $numero=0;
                    $total=0;
                    while($commandes=$SelData->fetch()){
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
                        <td scope="row"><a href="../assets/img/clients/<?=$commandes['photo']?>"><img src="../assets/img/clients/<?=$commandes['photo']?>" alt="" width=40></a>
                       
                      <?=$commandes['nom']." ".$commandes['postnom']." ".$commandes['prenom']?></td>
                        <td><?php $dates=strtotime($commandes["dates"]); echo date('d-m-Y h:m:s',$dates);?></td>
                        <td><?=$total?>$</td>
                        <td>
                           
                             <a href="commande_en_ligne.php?com=<?=$commandes['id']?>" class="btn btn-warning btn-sm ">Details</a>
                             
                              <a onclick=" return confirm('Voulez-vous accepter cette commande et la servir ?')"
                             href="../models/traitement_com_online.php?idcom=<?=$commandes['id'] ?>"
                              class="btn btn-success btn-sm "><i class="bi bi-check"></i></a>
                         </td>
                    </tr> 
                    <?php } ?>        
                  </tbody>
              </table>
            </div>
          </div>
            <?php } ?>

        </div>
        

    </div>
    
</div>

<div class="card">
    <div class="card-body">
       
        <?php if(isset($_SESSION['notif'])){ ?>
                 <center><p class="alert-dark alert">
                <i class="bi bi-check-circle me-1"><?php echo $_SESSION['notif']; unset($_SESSION['notif']);?></i>
                                                   
            </p></center>
        <?php } ?>
                                
        <h5 class="card-title ">Commande acceptees</h5>
          <?php if(isset($_GET['com'])){?>
          <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12">
            <div class=" table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">N°</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Description</th>
                          <th scope="col">Qte</th>
                          <th scope="col">P.U</th>
                          <th scope="col">P.T</th>
                         

                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $numero=0;
                    $total=0;
                    while($data=$Selpanier->fetch()){
                        $numero++;
                        $PT=$data['prixunitaire']*$data['quantite'];
                        $total=$total+$PT;
                    ?>
                    <tr>
                        <td><?=$numero?></td>
                        <th scope="row"><a href="../assets/img/produit/<?=$data['photo']?>"><img src="../assets/img/produit/<?=$data['photo']?>" alt="" width=40></a></th>
                        <td><?=$data['designation']?></td>
                        <td><?=$data['quantite']?></td>
                        <td><?=$data['prixunitaire']?>$</td>
                        <td><?=$PT?>$</td>
                       
                    </tr> 
                    <?php } ?> 
                    <tr>
                      <td colspan='5'>TOTAL</td>
                      <td><?=$total?>$</td>
                    </tr>       
                  </tbody>
              </table>
            </div>
          </div>
          <?php }else { ?>
            <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12">
            <div class=" table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">N°</th>
                          <th scope="col">Client</th>
                          <th scope="col">Date</th>
                          <th scope="col">Montant</th>
                          <th scope="col">Action</th>

                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $numero=0;
                    $total=0;
                    while($commandes=$SelData_servie->fetch()){
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
                        <td scope="row"><a href="../assets/img/clients/<?=$commandes['photo']?>"><img src="../assets/img/clients/<?=$commandes['photo']?>" alt="" width=40></a>
                       
                      <?=$commandes['nom']." ".$commandes['postnom']." ".$commandes['prenom']?></td>
                        <td><?php $dates=strtotime($commandes["dates"]); echo date('d-m-Y h:m:s',$dates);?></td>
                        <td><?=$total?>$</td>
                        <td>
                           
                             <a href="commande_en_ligne.php?com=<?=$commandes['id']?>" class="btn btn-warning btn-sm ">Details</a>
                             
                            
                         </td>
                    </tr> 
                    <?php } ?>        
                  </tbody>
              </table>
            </div>
          </div>
            <?php } ?>

        </div>
        

    </div>
    
</div>

</div>

       

    

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
   <?php include('../include/footer.php');?>
 <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  
<?php  include('../include/script.php');?>
</body>

</html>