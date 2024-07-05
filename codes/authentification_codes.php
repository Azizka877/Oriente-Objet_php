<?php
// include 'config/app.php';
include 'controllers/RegisterController.php';
include 'controllers/LoginController.php';

$auth = new LoginController;


//logout

if (isset($_POST['logout_btn'])){
    $checkLoggout = $auth->logout();
    if ($checkLoggout){
        redirect("Logout successful", "login.php");
    }
}
    



//Login function

if (isset($_POST['login_btn'])){
    $email = validateInput($db->conn  ,$_POST['email']);
    $password = validateInput($db->conn,$_POST['password']);
    $checkLogin = $auth->checkLogin($email,$password);
    if ($checkLogin){
        if($_SESSION['auth_role'] == '1'){
            redirect("Login successful", "admi/index.php");
        
        }else{
            redirect("Login successful", "index.php");
        }
    } else {
        redirect("Login failed", "login.php");
    }
}




// Register function
if (isset($_POST['register_btn'])){
    $fname = validateInput($db->conn, $_POST['fname']);
    $lname = validateInput($db->conn, $_POST['lname']);
    $email = validateInput($db->conn, $_POST['email']);
    $password = validateInput($db->conn, $_POST['password']);
    $confirm_password = validateInput($db->conn, $_POST['confirm_password']);
    
    $register = new RegisterController;
    // Validate inputs and store in database
    $result_password = $register->confirmPassword($password,$confirm_password);
    if ($result_password){
     $result_user = $register->isUserExists($email);
     if ($result_user){
       redirect("Email already exists", "register.php");

     }else{
      $result_register = $register->registration($fname, $lname, $email, $password);
      if ($result_register){
       redirect("Registration successful", "login.php");
      } else {
       redirect("Registration failed", "register.php");
      }
     }
    }else{
     redirect("Password and confirm password do not match", "register.php");
    }
}