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

    $db->set_charset("utf8mb4");

foreach ($_POST as $key=>$value){
    $_POST[$key] = $db->real_escape_string($value);
}


foreach ($_GET as $key=>$value){
    $_GET[$key] = $db->real_escape_string($value);
}
    
?>