<?php

include "../../db.php";

if($_POST){
    
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    $admin = isset($_POST["admin"])?1:0;
    
    $consulta = "INSERT INTO usuario (nombre,apellidos,correo,password,admin) 
                    VALUES ('$nombre','$apellidos','$correo','$password','$admin')";
                    
    $res = $db->query($consulta);
    
    if($res){
        echo "Usuario registrado";
    }else{
        echo "Error en el registro de usuario";
    }
}

?>