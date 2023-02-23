<?php
include "../../db.php";
$consulta = "SELECT * FROM usuario";
$res = $db->query($consulta);

    $cadena = "";
    
    while($row = $res->fetch_assoc()){

        $cadena .="<tr>
                <td>".$row['nombre']."</td>
                <td>".$row['apellidos']."</td>
                <td>".$row['correo']."</td>
                <td>".$row['admin']."</td>
                <td ><button data-id=".$row['id']." class='editar'><i class='fa-solid fa-pen-to-square'></i></button></td>
                <td ><button data-id=".$row['id']." class='borrar'><i class='fa-solid fa-trash'></i></button></td>
                </tr>
                ";
    };

        echo $cadena;
?>