<?php
include "../../db.php";
include "../../includes/recortaTxt.php";

$consulta = "SELECT p.*,COUNT(f.id) AS imagenes, u.nombre AS autor FROM post p 
            LEFT JOIN usuario u ON p.id_usuario = u.id 
            LEFT JOIN fotos_post f ON f.id_post = p.id
            GROUP BY p.id";
$res = $db->query($consulta);


    $cadena = "";
    
    while($row = $res->fetch_assoc()){

        $txt = recortaTxt($row['texto'],145);

        $cadena .="<tr>
                <td>".$row['titulo']."</td>
                <td >".$txt."</td>
                <td>".$row['fecha']."</td>
                <td>".$row['autor']."</td>
                <td>".$row['imagenes']."</td>
                <td ><button onClick='cargarForm(`ajax/post/editar-post.php?id=".$row['id']."`)' ><i class='fa-solid fa-pen-to-square'></i></button></td>
                <td ><button onClick='borrarFila(".$row['id'].", `post`)'><i class='fa-solid fa-trash'></i></button></td>
                </tr>
                ";
    };

        echo $cadena;
?>