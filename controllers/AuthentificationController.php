<?php

class AuthentificationController {
    private $conn;
    public function __construct(){
        $db = new DatabaseConnexion();
        $this->conn = $db->conn;
        $this->checkIsLoggedIn();
    }

public function admin(){
    $user_id = $_SESSION['auth_user']['user_id'];  
    $checkAdmin = "SELECT id,role_as FROM users WHERE id='$user_id' AND role_as='1' LIMIT 1"; 
    $result = $this->conn->query($checkAdmin);

    if($result->num_rows == 1){
        return true;
    } else{
        redirect('You are not authorized as admin', "index.php");
        return false;
    }
}




    private function checkIsLoggedIn(){
        if(!isset($_SESSION['authentificated'])){
            redirect("Login to access the page","login.php");
            
        } else{
            return true;
        }
    }
    public function authDetails(){
        $checkAuth = $this->checkIsLoggedIn();
        if( $checkAuth){
            $user_id = $_SESSION['auth_user']['user_id'];
            $getUserData = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";
            $result = $this->conn->query($getUserData);
            if($result->num_rows > 0){
                $data = $result->fetch_assoc();
                return $data;

            }else{
                redirect('something went wrong', 'login.php');
            }
        }else{
            return false;
        }
    }
}

$authentificated = new AuthentificationController();