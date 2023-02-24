<?php  

session_start();

if (!isset($_SESSION['id_autor'])){
    header("Location:login.php");
    die();
}

    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "pasteleria";

    $db = new mysqli($host, $user, $password, $db_name);
    
?>