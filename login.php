<?php
include 'config/app.php';
include 'codes/authentification_codes.php';
$auth->isLoggedIn();
include "./includes/header.php";
include "./includes/navbar.php";
?>

   <div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php  include 'message.php' ?>
                <div class="card">
                    <div class="card-header">
                        <h1>Login Form</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
            
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="login_btn">Login</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>



<?php include "./includes/footer.php"?>
