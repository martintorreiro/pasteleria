<?php  

    session_start();

    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "pasteleria";

   /*  $host = "db5012377622.hosting-data.io";
    $user = "dbu5390265";
    $password = "Villa2016.";
    $db_name = "dbs10409162"; */

    $db = new mysqli($host, $user, $password, $db_name);
    


?>