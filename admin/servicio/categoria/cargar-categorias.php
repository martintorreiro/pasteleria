<?php
include "../../db.php";

$consultaCat = "SELECT * FROM categoria";
$resCat = $db->query($consultaCat);
$consultaSub = "SELECT * FROM subcategoria";
$resSub = $db->query($consultaSub);

    $cadena = "";
    
    while($row = $resCat->fetch_assoc()){

        $id = $row["id"];
        $cadenaSub="";
        $countSub = 0;
        $separador="";
        while($rowSub = $resSub->fetch_assoc()){

            if($rowSub["id_categoria"]==$row["id"]){
                $cadenaSub .= $separador."<td>".$rowSub["nombre"]."</td>
                <td><button onClick='cargarForm(`ajax/categoria/editar-subcategoria.php?id=".$rowSub['id']."`)' ><i class='fa-solid fa-pen-to-square'></i></button></td>
                <td><button onClick='borrarFila(".$rowSub['id']." , `subcategoria`)'><i class='fa-solid fa-trash'></i></button></td>
                </tr>
                ";
                
                $separador="<tr>";
                $countSub++;
            }
            
        } 
        if ($countSub==0)$countSub=1;
        $resSub->data_seek(0);

        $cadena .="<tr>
                <td rowspan=".$countSub.">".$row['nombre']."</td>
                <td rowspan=".$countSub."><button onClick='cargarForm(`ajax/categoria/editar-categoria.php?id=".$row['id']."`)' ><i class='fa-solid fa-pen-to-square'></i></button></td>
                <td rowspan=".$countSub."><button onClick='borrarFila(".$row['id'].", `categoria`)'><i class='fa-solid fa-trash'></i></button></td>
                <td rowspan=".$countSub."><button onClick='cargarForm(`ajax/categoria/nueva-subcategoria.php?id=$id`)'><i class='fa-regular fa-square-plus'></i></button></td>".$cadenaSub."
            ";
            if ($separador=="") $cadena.="</tr>";
    };

        echo $cadena;
?>