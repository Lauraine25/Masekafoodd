<?php 
include('../connexion/connexion.php');
include('../models/select/sel-vente-gateau.php');


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
      <h1>Vente</h1>
      
    </div><!-- End Page Title -->

    <section class="section dashboard">
      
      <div class="row">
      <div class="col-lg-12">

<div class="card">
    <div class="card-body">
        <h5 class="card-title "> <?=$titre?></h5>
        <?php if(isset($_SESSION['notif'])){ ?>
                 <center><p class="alert-dark alert">
                <i class="bi bi-check-circle me-1"><?php echo $_SESSION['notif']; unset($_SESSION['notif']);?></i>
                                                   
            </p></center>
        <?php } ?>
                                
       <div class="row">
          <?php if(isset($_GET['new'])){ ?>
            <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12">
              <form  class="shadow p-3"action="../models/add/add-vente.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                    <label for="">Choisir le client </span></label>
                    <select name="client" id="client" class="form-select">
                      
                        <?php while($client=$SelClient->fetch()){
                          if(isset($id)){ ?>
                        <option <?php if($client['id']==$ModData['client']){  ?> Selected <?php  } ?>value="<?=$client['id']?>"><?=$client['nom']." ".$client['postnom']." ".$client['prenom']?></option>
                        <?php }else{ ?>
                        <option value="<?=$client['id']?>"><?=$client['nom']." ".$client['postnom']." ".$client['prenom']?></option>
                        <?php } } ?>

                    </select>
                                            
                </div>

                
                <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                    <a class="btn btn-dark btn-sm" href="choisir_gateau.php"> cliquer ici pour choisir produit</a>
                    <?php if(isset($_GET['produit'])){ ?>
                     
                      <select   name="produit" id="produit" class="form-select">
                          <?php while($produit=$SelProd->fetch()){
                            if(isset($id)){ ?>
                          <option <?php if($produit['id']==$ModData['produit']){  ?> Selected <?php  } ?>value="<?=$produit['id']?>"><?=$produit['designation']." au prix de  ".$produit['prix']?>$</option>
                          <?php }else{ ?>
                          <option value="<?=$produit['id']?>"><?=$produit['designation']." au prix de  ".$produit['prix']?>$</option>
                          <?php } } ?>

                      </select>
                    <?php } ?>
               
                                            
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                      <label for="">information a mettre sur le gateau</span></label>
                      
                      <input autocomplete="off" required type="text" class="form-control" placeholder="gateau avec dessin du clavier" id="information" min="1"  name="information" <?php if(isset($id)){?> value="<?=$ModData['quanite']?>"<?php } ?>>   
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                      <label for="">Date de livraison</span></label>
                      
                      <input autocomplete="off" required type="datetime-local" class="form-control"  id="datelivraison" min="1"  name="datelivraison" <?php if(isset($id)){?> value="<?=$ModData['quanite']?>"<?php } ?>>   
                </div>

                
                <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">
                    <input type="submit" class="btn btn-warning w-100" name="valider" value="Ajouter au panier">
                </div>
            </div>

          


              </form>
          </div>
          <?php } else if(isset($_GET['com'])){ ?>

            <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12">
              <form  class="shadow p-3"action="../models/add/add-vente.php?commande=<?=$_GET['com']?>&prix=" method="POST" enctype="multipart/form-data">
              <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 p-3">
                    <label for="">Choisir le client </span></label>
                    <select name="client" id="client" class="form-select">
                      
                        <?php while($client=$SelClient->fetch()){
                          if(isset($id)){ ?>
                        <option <?php if($client['id']==$ModData['client']){  ?> Selected <?php  } ?>value="<?=$client['id']?>"><?=$client['nom']." ".$client['postnom']." ".$client['prenom']?></option>
                        <?php }else{ ?>
                        <option value="<?=$client['id']?>"><?=$client['nom']." ".$client['postnom']." ".$client['prenom']?></option>
                        <?php } } ?>

                    </select>
                                            
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 p-3">
                    <a class="btn btn-dark btn-sm" href="choisir_produit.php?com=<?=$_GET['com'] ?>"> cliquer ici pour choisir produit</a>
                    <?php if(isset($_GET['produit'])){ ?>
                     
                      <select   name="produit" id="produit" class="form-select">
                          <?php while($produit=$SelProd->fetch()){
                            if(isset($id)){ ?>
                          <option <?php if($produit['id']==$ModData['produit']){  ?> Selected <?php  } ?>value="<?=$produit['id']?>"><?=$produit['designation']." au prix de  ".$produit['prix']?>$</option>
                          <?php }else{ ?>
                          <option value="<?=$produit['id']?>"><?=$produit['designation']." au prix de  ".$produit['prix']?>$</option>
                          <?php } } ?>

                      </select>
                    <?php } ?>
               
                                            
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                      <label for="">information a mettre sur le gateau</span></label>
                      
                      <input autocomplete="off" required type="text" class="form-control" placeholder="gateau avec dessin du clavier" id="information" min="1"  name="information" <?php if(isset($id)){?> value="<?=$ModData['quanite']?>"<?php } ?>>   
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                      <label for="">Date de livraison</span></label>
                      
                      <input autocomplete="off" required type="datetime-local" class="form-control"  id="datelivraison" min="1"  name="datelivraison" <?php if(isset($id)){?> value="<?=$ModData['quanite']?>"<?php } ?>>   
                </div>

                
                <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">
                    <input type="submit" class="btn btn-warning w-100" name="valider" value="Ajouter au panier">
                </div>
            </div>


              </form>
            </div>
         
          <?php }else{ ?>
              <a href="vendre_gateau.php?new" class="col-12 btn btn-outline-danger bi bi-plus">Ventre gateau</a> 
          

          <?php }?>
         
            <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12">
            <div class=" table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">N°</th>
                          <th scope="col">Client</th>
                          <th scope="col">Modele</th>
                          <th scope="col">information</th>
                          <th scope="col">Date de la commande </th>
                          <th scope="col">Date livraison</th>
                          <th scope="col">Prix</th>
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
                           
                             <a href="vendre.php?com=<?=$commandes['id']?>" class="btn btn-warning btn-sm "><i
                             class="bi bi-eye-fill"></i></a>
                              <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"
                             href="../models/del/del-ventre.php?iddelcom=<?=$commandes['id'] ?>"
                              class="btn btn-danger btn-sm "><i class="bi bi-trash3-fill"></i></a>
                         </td>
                    </tr> 
                    <?php } ?>        
                  </tbody>
              </table>
            </div>
          </div>
            



          
        </div>
        <!-- End Table with stripped rows -->

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