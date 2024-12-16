<?php

$SelData=$connexion->prepare("SELECT *  from produit");
$SelData->execute();

$SelGateau=$connexion->prepare("SELECT *  from gateau");
$SelGateau->execute();

?>