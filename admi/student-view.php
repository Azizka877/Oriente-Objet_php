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

     

<div class="container pt-5  ms-5">
    
    <div class="row ">
        <div class="col-md-2"></div>
        <div class="col-md-10 ">
            <?php include '../message.php'  ?> 
            <div class="card ">
                <div class="card-header">
                    <h1>Student View</h1>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Course</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $student = new StudentController;
                            $result = $student->getData();
                            if ($result){
                                foreach($result as $row){
                                    ?>
                                    <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['fullname'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['course'] ?></td>
                                <td>
                                    <a href="student-edit.php?id=<?= $row['id'] ?>" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                   
                                    <form action="codes/student-codes.php" method="POST">
                                       <button type="submit" value="<?=$row['id']?>" name="deleteStudent" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                                    <?php
                                }
                                
                            }else{
                                echo 'No records found';
                            }
                            ?>
                            
                        </tbody>

                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<?php include 'includes/footer.php'  ?>








