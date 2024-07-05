<?php 
include('../config/app.php');

include_once '../controllers/AuthentificationController.php';
$authentificated = new AuthentificationController(); 
$authentificated->admin();


include 'includes/header.php';

?>



<div class="container pt-5 px-4">
    
    <div class="row">
        <div class="col-md-12">
            <?php include '../message.php'  ?> 
            <div class="card">
                <div class="card-header">
                    <h1>Student Add</h1>
                </div>
                <div class="card-body">

                <form action="codes/student-codes.php" method="POST">
                    <div class="mb-3">
                        <label for="">Full Name</label>
                        <input type="text" name="fullname"   class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Email ID</label>
                        <input type="text" name="email"   class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Courses</label>
                        <input type="text" name="course"   class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="tel">Phone Number</label>
                        <input type="text" name="phone"   class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="save_student" class="btn btn-primary"  >Save Student</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>










<!-- <?php   include 'includes/footer.php'; ?> -->