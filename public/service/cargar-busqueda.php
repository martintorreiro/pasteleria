<?php

    include "../db.php";
    
    if($_GET){
        $search = $_GET["search"];

        $consulta = "SELECT p.*, fp.nombre AS img FROM producto p 
                    LEFT JOIN fotos_producto fp ON fp.id_producto = p.id 
                    WHERE p.nombre LIKE '%$search%' GROUP BY p.id";
        $res = $db->query($consulta);

        $cadena = "";
        while($row = $res->fetch_assoc()){
            $cadena .= "
                        <li >
                        <a class='producto-search' href='producto.php?prod=".$row['id']."'>
                        <div class='flex ai-center padd-25 hover-bg-gris'>
                            
                            
                            <img class='w-50' src='fotos-producto/".$row['img']."' alt='imagen producto'>
                            <div class='marg-l-10'>
                                <h4 class='color-negro-letra'>".$row['nombre']."</h4>
                                <span class='color-naranja'>$".$row['precio']."</span>
                            </div>
                            
                        </div>
                        </a>
                        </li>";
        }

        echo(json_encode($cadena)) ;

    }
    

?>