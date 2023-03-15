<?php  

    session_start();

    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "pasteleria";

    $db = new mysqli($host, $user, $password, $db_name);
    


?>