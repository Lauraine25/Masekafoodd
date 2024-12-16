<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
  <?php if($_SESSION['fonction']=='Admin'){?>
  <li class="nav-item">
    <a class="nav-link " href="../views/utilisateur.php">
      <i class="bi bi-people-fill"></i>
      <span>utilisateur</span>
    </a>
  </li>
  <?php } else { ?>
    <li class="nav-item">
    <a class="nav-link " href="../views/model-gateau.php">
      <i class="bi bi-basket-fill"></i>
      <span>Modeles gateau</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="../views/categorie.php">
      <i class="bi bi-file-spreadsheet-fill"></i>
      <span>Categorie</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="../views/produit.php">
      <i class="bi bi-slack"></i>
      <span>Produit</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link "  href="../views/stock.php">
      <i class="bi bi-calculator-fill"></i>
      <span>Ajouter Stock</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="../views/client.php">
      <i class="bi bi-people-fill"></i>
      <span>Client</span>
    </a>
  </li>

 
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Ventre</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../views/vendre_gateau.php">
          <i class="bi bi-circle"></i><span>Gateau</span>
        </a>
      </li>
      <li>
        <a href="../views/vendre.php">
          <i class="bi bi-circle"></i><span>Autre</span>
        </a>
      </li>
     
     
     
    </ul>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Commande en ligne</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../views/commande_en_ligne_gateau.php">
          <i class="bi bi-circle"></i><span>Gateau</span>
        </a>
      </li>
      <li>
        <a href="../views/commande_en_ligne.php">
          <i class="bi bi-circle"></i><span>Autre</span>
        </a>
      </li>
     
     
     
    </ul>
  </li>
  <?php } ?>
  <li class="nav-item">
    <a class="nav-link " href="../index.php">
      <i class="bi bi-arrow-left"></i>
      <span>Deconnexion</span>
    </a>
  </li>


</ul>

</aside><!-- End Sidebar-->