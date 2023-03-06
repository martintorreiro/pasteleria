<?php

include "../../db.php";

if($_POST){
    
    $titulo = $_POST["titulo"];
    $texto = $_POST["texto"];
    $fecha = $_POST["fecha"];
    $id_usuario = $_POST["autor"];
    $imagenes = $_FILES["imagenes"];


    $consulta = "INSERT INTO post (titulo,texto,fecha,id_usuario)
                VALUES ('$titulo','$texto','$fecha','$id_usuario')";
    $res = $db->query($consulta);   
    
    echo $consulta;

    $respuesta = new stdClass();

    $idPost = $db->insert_id;
    
    if($res&&isset($imagenes)){

        $total = count($imagenes['name']);

        for( $i=0 ; $i < $total ; $i++ ){

            $imagen = $imagenes['name'][$i];
            $tmpFilePath = $imagenes['tmp_name'][$i];

            if ($tmpFilePath != ""){

                $newFilePath = "../../../public/fotos-post/" . $imagenes['name'][$i];

                if(move_uploaded_file($tmpFilePath, $newFilePath)){

                    $consulta =  "INSERT INTO fotos_post (nombre,id_post) 
                        VALUES ('$imagen',$idPost)";
                    $res = $db->query($consulta);

                    if(!$res){
                        unlink($newFilePath);

                        $respuesta->estado="404";
                        $respuesta->mensaje="Error al guardar las imagenes.";

                        echo json_encode($respuesta) ;

                    }else{
                        $respuesta->estado="ok";
                        $respuesta->mensaje="Imagenes guardadas correctamente.";

                        echo json_encode($respuesta) ;
                    } 

                }
            }
        }
    }else{}

    
}

?>