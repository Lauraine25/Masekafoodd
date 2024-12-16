<?php 
include('../connexion/connexion.php');
include('../models/select/sel-produit.php');


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
      <h1>Produit</h1>
      
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
              <form  class="shadow p-3"action="<?=$action?>" method="POST" enctype="multipart/form-data">
              <div class="row">
                 <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                    <label for="">Categorie</span></label>
                    <select name="categorie" id="categorie" class="form-select">
                        <?php while($categorie=$SelCat->fetch()){
                           if(isset($id)){ ?>
                        <option <?php if($categorie['id']==$ModData['categorie']){  ?> Selected <?php  } ?>value="<?=$categorie['id']?>"><?=$categorie['designation']?></option>
                        <?php }else{ ?>
                        <option value="<?=$categorie['id']?>"><?=$categorie['designation']?></option>
                        <?php } } ?>

                    </select>
                                            
                 </div>
                 <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                      <label for="">Designation</span></label>
                      <input autocomplete="off" required type="text" class="form-control" placeholder="Ex Pain simple" id="designation"  name="designation" <?php if(isset($id)){?> value="<?=$ModData['designation']?>"<?php } ?>>   
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                      <label for="">Prix en dollar</span></label>
                      <input autocomplete="off" required type="text" class="form-control" placeholder="Ex:0.5 " id="prix"  name="prix" <?php if(isset($id)){?> value="<?=$ModData['prix']?>"<?php } ?>>   
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                      <label for="">Photo</span></label>
                      <input autocomplete="off" required type="file" class="form-control"  id="photo"  name="photo" <?php if(isset($id)){?> value="<?php echo $ModData['photo']?>"<?php } ?>>   
                  </div>

                
                <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">
                    <input type="submit" class="btn btn-warning w-100" name="valider" value="<?=$bouton?>">
                </div>
            </div>


              </form>
          </div>
         
          <?php }else{ ?>
              <a href="produit.php?new" class="col-12 btn btn-outline-danger bi bi-plus">Nouveau produit</a> 
          

          <?php }?>
          <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12">
            <div class=" table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">N°</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Description</th>
                          <th scope="col">Prix</th>
                          <th scope="col">Action</th>

                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $numero=0;
                    while($data=$SelData->fetch()){
                        $numero++;
                    ?>
                    <tr>
                        <td><?=$numero?></td>
                        <th scope="row"><a href="../assets/img/produit/<?=$data['photo']?>"><img src="../assets/img/produit/<?=$data['photo']?>" alt="" width=40></a></th>
                        <td><?=$data['designation']?></td>
                        <td><?=$data['prix']?>$</td>
                        <td>
                            <a href="produit.php?new&mod=<?=$data['id']?>" class="btn btn-dark btn-sm "><i
                             class="bi bi-pencil-square"></i></a>
                              <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"
                             href="../models/del/del-produit.php?iddel=<?=$data['id'] ?>"
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