<?php

include "../db.php";

if($_POST){
    
    $nombre = $_POST["nombre"];
    $nombre = $_POST["nombre"];
    
    $consulta = "INSERT INTO producto (nombre,precio,stock,descripcion,gluten_free,valoracion,id_subcategoria,)
                             VALUES ('$nombre')";
    $res = $db->query($consulta);

    echo $res ;
}

?>