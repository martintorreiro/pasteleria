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
                <td ><button onClick='cargarForm(`ajax/usuario/editar-usuario.php?id=".$row['id']."`)' ><i class='fa-solid fa-pen-to-square'></i></button></td>
                <td ><button onClick='borrarFila(".$row['id'].", `usuario`)'><i class='fa-solid fa-trash'></i></button></td>
                </tr>
                ";
    };

        echo $cadena;
?>