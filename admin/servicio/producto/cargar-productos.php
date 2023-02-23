<?php
include "../../db.php";
$consulta = "SELECT p.*,COUNT(f.id) AS imagenes ,s.nombre AS nombreSubcategoria, c.nombre AS nombreCategoria FROM producto p 
            LEFT JOIN fotos_producto f ON f.id_producto = p.id
            LEFT JOIN subcategoria s ON p.id_subcategoria = s.id
            LEFT JOIN categoria c ON c.id = s.id_categoria
            GROUP BY p.id";
$res = $db->query($consulta);

    $cadena = "";
    
    while($row = $res->fetch_assoc()){

        $cadena .="<tr>
                <td>".$row['nombre']."</td>
                <td>".$row['descripcion']."</td>
                <td>".$row['precio']."</td>
                <td>".$row['stock']."</td>
                <td>".$row['imagenes']."</td>
                <td>".$row['gluten_free']."</td>
                <td>".$row['nombreCategoria']."</td>
                <td>".$row['nombreSubcategoria']."</td>
                <td ><button data-id=".$row['id']." class='editar'><i class='fa-solid fa-pen-to-square'></i></button></td>
                <td ><button data-id=".$row['id']." class='borrar'><i class='fa-solid fa-trash'></i></button></td>
                </tr>
                ";
    };

        echo $cadena;
?>