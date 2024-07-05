<?php 
include('../config/app.php');

include_once '../controllers/AuthentificationController.php';
$authentificated = new AuthentificationController(); 
$authentificated->admin();


include 'includes/header.php';


?>
        <?php include 'includes/navbar.php'  ?>
    
       <?php include 'includes/sidebar.php'  ?>
       <?php include 'includes/card.php'  ?>    
                     
     
     <?php include 'includes/footer.php'  ?>
