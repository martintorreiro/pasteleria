<?php
    include "../db.php";
    
    if($_POST){
        $idProducto = $_POST["id"];
        $nombre =  $_POST["name"];
        $resumen = $_POST["summary"];
        $comentario = $_POST["review"];
        $notaValue = $_POST["v"];
        $notaQuality = $_POST["q"];
        $notaPrice = $_POST["p"];

       $consulta = "INSERT INTO comentarios_producto (nombre,resumen,comentario,nota_valor,nota_precio,nota_calidad,fecha,id_producto)
                                            VALUES ('$nombre','$resumen','$comentario',$notaValue,$notaPrice,$notaQuality,now(),$idProducto)";
        $res=$db->query($consulta);
        echo $consulta;
    }

?>