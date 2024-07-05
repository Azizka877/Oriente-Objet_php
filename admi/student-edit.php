<?php 
include('../config/app.php');

include_once '../controllers/AuthentificationController.php';
$authentificated = new AuthentificationController(); 
$authentificated->admin();

include_once 'controllers/StudentController.php';

include 'includes/header.php';

?>

<?php include 'includes/navbar.php'  ?>
<?php include 'includes/sidebar.php'  ?>

<div class="container pt-5 px-4">
    
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9">
            <?php include '../message.php'  ?> 
            <div class="card">
                <div class="card-header">
                    <h1>Student Edit</h1>
                </div>
                <div class="card-body">
                    <?php 
                    if(isset($_GET['id'])){
                        $student_id = validateInput($db->conn,$_GET['id']);
                        
                        $student = new StudentController;
                        $result = $student->editStudent($student_id);
                         if($result){
                           ?>
                           <form action="codes/student-codes.php" method="POST">
                            <input type="hidden" value="<?=$result['id']?>" name="student_id"  >
                           <div class="mb-3">
                        <label for="">Full Name</label>
                        <input type="text" name="fullname" value="<?= $result['fullname']?>"   class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Email ID</label>
                        <input type="text" name="email" value="<?= $result['email']?>"  class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Courses</label>
                        <input type="text" name="course" value="<?= $result['course']?>"   class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="tel">Phone Number</label>
                        <input type="text" name="phone" value="<?= $result['phone']?>"  class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="update_student" class="btn btn-primary"  >Update Student</button>
                    </div>
                </form>
                           <?php
                         }else{
                             echo "<h4> Student not found </h4>";
                         }
                    }else{
                        echo "No ID found";
                        
                    }
                    ?>

                
                </div>
            </div>
        </div>
    </div>
</div>


<?php   include 'includes/footer.php'; ?>