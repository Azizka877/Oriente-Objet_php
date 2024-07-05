<?php
session_start();
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','ooplogin');
define('SITE_URL','http://localhost/PhpProject/seriesOOPphp/');

include_once('DatabaseConnexion.php');
$db = new DatabaseConnexion;

if (!function_exists('base_url')) {
    function base_url($slug){
        echo SITE_URL . $slug;
    }
}
function redirect($message, $page){
    $redirectTo = SITE_URL.$page;
    $_SESSION['message']=$message;
    header("Location: $redirectTo");
    exit(0);
}


function validateInput($dbconn, $input){
    return mysqli_real_escape_string($dbconn, $input);
}