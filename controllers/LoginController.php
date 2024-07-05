<?php
class LoginController {
    private $conn;
    public function __construct(){
        $db = new DatabaseConnexion;
        $this->conn = $db->conn;
    }


    public function checkLogin($email, $password){
        $checkLogin = "SELECT * FROM users WHERE email = '$email' AND password = '$password' Limit 1";
        $result = $this->conn->query($checkLogin);
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            $this->userAuthentification($data);
            return true;
        }else{
            return false;
        } 
    }


    private function userAuthentification($data){
        $_SESSION['authentificated']= true;
        $_SESSION['auth_role']= $data['role_as'];
        $_SESSION['auth_user']= [
        'user_id' => $data['id'],
        'user_fname' => $data['fname'],
        'user_lname' => $data['lname'],
        'user_email' => $data['email'],
        ];
    }
    public function isLoggedIn(){
        if(isset($_SESSION['authentificated']) === true) {
            redirect("You are already logged in", 'index.php');
        }else{
            return false;
        }
    }
    public function logout(){
        if(isset($_SESSION['authentificated']) === true){
            unset($_SESSION['authentificated']);
            unset($_SESSION['auth_user']);
            return true;
        }else{
          return false;
        }
        }
}