<?php

include "../../db.php";

if($_POST){
    
    $nombre = $_POST["nombre"];
    
    $consulta = "INSERT INTO categoria (nombre) VALUES ('$nombre')";
    $res = $db->query($consulta);

    echo $res ;
}

?>