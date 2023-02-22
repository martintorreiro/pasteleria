<?php

include "../../db.php";

if($_POST){
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    
    $consulta = "INSERT INTO subcategoria (nombre,id_categoria) VALUES ('$nombre',$id)";
    $res = $db->query($consulta);

    echo $res ;
}

?>