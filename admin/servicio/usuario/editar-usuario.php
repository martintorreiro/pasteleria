<?php

include "../../db.php";

if($_POST){
    
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $admin = isset($_POST["admin"])?1:0;
    


    $consulta = "UPDATE usuario SET nombre = '$nombre', apellidos = '$apellidos',correo = '$correo',
                admin = '$admin' WHERE id = $id";

    $res = $db->query($consulta);
    


   

    echo $res ;
}

?>