<?php

include "../../db.php";

if($_POST){
    
    $nombre = $_POST["nombre"];
    $imagen = $_FILES["imagen"];
    

    if(isset($imagen)&& $imagen != NULL){

            $tmpFilePath = $imagen['tmp_name'];

            if ($tmpFilePath != ""){

                $newFilePath = "../../../public/fotos-categoria/" . $imagen['name'];

                if(move_uploaded_file($tmpFilePath, $newFilePath)){

                    $imagen =  $imagen["name"];
                    $consulta = "INSERT INTO categoria (nombre,imagen) VALUES ('$nombre','$imagen')";
                    
                    $res = $db->query($consulta);
                    echo "ok";
                    
                    }else{
                        echo "error";
                    } 

            }
        
    }else{
        echo "error";
    }
}

?>