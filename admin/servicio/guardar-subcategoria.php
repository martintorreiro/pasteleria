<?php

include "../db.php";

if($_POST){
    
    $nombre = $_POST["nombre"];
    
    $consulta = "INSERT INTO subcategoria (nombre) VALUES ('$nombre')";
    $res = $db->query($consulta);

    echo $res ;
}

?>