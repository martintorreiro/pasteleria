<?php

include "../db.php";

if($_POST){

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    
    $consulta = "UPDATE subcategoria SET nombre = '$nombre'  WHERE id=$id";
    $res = $db->query($consulta);

    echo $id ;
}

?>