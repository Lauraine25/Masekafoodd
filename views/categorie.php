<?php 
include('../connexion/connexion.php');
include('../models/select/sel-categorie.php');


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
      <h1>Categorie</h1>
      
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

            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6">
              <form  class="shadow p-3"action="<?=$action?>" method="POST">
               <div class="row">
              
                
                 
                  <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 p-3">
                      <label for="">designation  de la categorie</span></label>
                      <input autocomplete="off" required type="text" class="form-control" placeholder="Ex Patisserie" id="designation"  name="designation" <?php if(isset($id)){?> value="<?=$ModData['designation']?>"<?php } ?>>   
                  </div>
                
                    <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">
                      <input type="submit" class="btn btn-warning w-100" name="valider" value="<?=$bouton?>">
                    </div>
                </div>


              </form>
          </div>
         
          <?php }else{ ?>
              <a href="categorie.php?new" class="col-12 btn btn-outline-danger bi bi-plus">Nouvelle categorie</a> 
          

          <?php }?>
          <div <?php if(isset($_GET['new'])){ ?>class="col-xl-6 col-lg-6 col-md-6  col-sm-6"<?php } else {?> class="col-12" <?php } ?>>
            <div class=" table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">N°</th>
                          <th scope="col">Nom </th>
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
                        <td><?=$data['designation']?></td>
                        <td>
                            <a href="categorie.php?new&mod=<?=$data['id']?>" class="btn btn-dark btn-sm "><i
                             class="bi bi-pencil-square"></i></a>
                              <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"
                             href="../models/del/del-categorie.php?iddel=<?=$data['id'] ?>"
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