<?php
include 'config/app.php';
include_once('controllers/AuthentificationController.php');
include 'codes/authentification_codes.php';
include "./includes/header.php";
include "./includes/navbar.php";
$authentificated = new AuthentificationController(); 
$data = $authentificated->authDetails();
?>

   <main>
       <div class="container-fluid px-4">
       <?php  include 'message.php' ?>
           <h1>My profile Page</h1>
          <br>
          <h4>Prenom: <?= $data['fname'] ?></h4>
          <h4>Nom: <?= $data['lname'] ?></h4>
          <h4>Email: <?= $data['email'] ?></h4>
       </div>
   </main>





<?php include "./includes/footer.php"?>
